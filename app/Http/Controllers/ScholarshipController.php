<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\ScholarshipDetail;
use App\Models\Transaction;
use App\Helpers\TransactionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{

  public function index()
  {
    $scholarships = Scholarship::with('course')->get();
    // dd($scholarships);  
    return view('scholarships.index', compact('scholarships'));
  }


  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'deadline' => 'required|date',
      'requirements' => 'required|string',
      'benefits' => 'required|string',
      'provider' => 'required|string|max:255',
      'link' => 'required|url',
      'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $validated['slug'] = Str::slug($validated['title']);

    if ($request->hasFile('image')) {
      $validated['image'] = $request->file('image')
        ->store('scholarships', 'public');
    }

    $scholarship = Scholarship::create($validated);

    return response()->json([
      'status' => 'success',
      'message' => 'Scholarship created successfully',
      'data' => $scholarship->fresh()
    ], 201);
  }

  public function show(int $id)
  {
    $scholarship = Scholarship::with('course')->find($id);
    //dd($scholarship);
    return view('scholarships.show', compact('scholarship'));
  }

  public function applyForScholarship(int $id)
  {
    //menerima request user auth 
    $user = Auth::user();

    //Mencari id scholarship
    $scholarship = Scholarship::with('course.agency')->where('id', $id)->first();

    // //Validasi scholarship user
    $existingApplication = ScholarshipDetail::where('id_user', $user->id)
      ->where('id_scholarship', $scholarship->id)
      ->first();

    if ($existingApplication) {
      return redirect()->back()->with('error', 'Kamu sudah terdaftar');
    }
    if (!$scholarship->isOpen()) {
      return redirect()->back()->with('error', 'Maaf, beasiswa ini sudah penuh');
    }



    try {
      DB::beginTransaction();
      $scholarshipData = [
        'id_user' => $user->id,
        'id_scholarship' => $scholarship->id,
        'date' => now(),
      ];
      $course = $scholarship->course;



      $transactionData = [
        'booking_id' => TransactionHelper::generateUniqueId(),
        'total_price' => 0,
        'type_payment' => 'manual',
        'status_payment' => 'paid',
        'type_products' => 'scholarship',
        'id_products' => $course->id,
        'id_user' => $user->id,
        'id_agency' => $course->agency->id,
      ];
      ScholarshipDetail::create($scholarshipData);
      Transaction::create($transactionData);
      $scholarship->decrement('slots_available');
      // dd($createdScholarship, $createdTransaction, $cek);
      DB::commit();
      return redirect()->route('external.dashboard')->with('success', 'Selamat, kami berhasil mendapatkan beasiswa');
    } catch (\Throwable $e) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Failed to apply for scholarship. Please try again.');
    }

  }

  public function update(Request $request, Scholarship $scholarship)
  {
    $validated = $request->validate([
      'title' => 'string|max:255',
      'description' => 'string',
      'deadline' => 'date',
      'requirements' => 'string',
      'benefits' => 'string',
      'provider' => 'string|max:255',
      'link' => 'url',
      'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->has('title')) {
      $validated['slug'] = Str::slug($request->title);
    }

    if ($request->hasFile('image')) {
      if ($scholarship->image) {
        Storage::disk('public')->delete($scholarship->image);
      }

      $validated['image'] = $request->file('image')
        ->store('scholarships', 'public');
    }

    $scholarship->update($validated);

    return response()->json([
      'status' => 'success',
      'message' => 'Scholarship updated successfully',
      'data' => $scholarship->fresh()
    ]);
  }

  public function destroy(Scholarship $scholarship)
  {
    if ($scholarship->image) {
      Storage::disk('public')->delete($scholarship->image);
    }

    $scholarship->delete();

    return response()->json([
      'status' => 'success',
      'message' => 'Scholarship deleted successfully'
    ]);
  }
}