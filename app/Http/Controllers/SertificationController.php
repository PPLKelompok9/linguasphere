<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sertification;
use Illuminate\Http\Request;

class SertificationController extends Controller
{
  public function index(Request $request)
  {
    $query = Sertification::query()->with(['agency', 'category']);

    // Search functionality
    if ($request->has('search') && !empty($request->search)) {
      $searchTerm = '%' . $request->search . '%';
      $query->where(function ($q) use ($searchTerm) {
        $q->where('name', 'like', $searchTerm)
          ->orWhere('description', 'like', $searchTerm)
          ->orWhereHas('agency', function ($q) use ($searchTerm) {
            $q->where('name', 'like', $searchTerm);
          })
          ->orWhereHas('category', function ($q) use ($searchTerm) {
            $q->where('name', 'like', $searchTerm);
          });
      });
    }

    // Category Filter
    if ($request->filled('category')) {
      $query->where('id_category', $request->category);
    }

    $sertifications = $query->latest()->get();
    $categories = Category::all();

    return view('Sertifications.index', compact('sertifications', 'categories'));
  }

  public function show($slug)
  {
    $sertification = Sertification::where('slug', $slug)
      ->with(['agency', 'category'])
      ->firstOrFail();

    return view('Sertifications.show', compact('sertification'));
  }

  public function comingSoon()
  {
    return view('user.sertification.index');
  }
}