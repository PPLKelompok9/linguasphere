<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::with('course')
            ->latest()
            ->paginate(6);

        return view('scholarships.index', compact('scholarships'));
    }

    public function show(Scholarship $scholarship)
    {
        return view('scholarships.show', compact('scholarship'));
    }

    public function apply(Request $request, Scholarship $scholarship)
    {
        $validated = $request->validate([
            'motivation_letter' => 'required|string|min:100',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $request->user()->scholarshipApplications()->create([
            'scholarship_id' => $scholarship->id,
            'motivation_letter' => $validated['motivation_letter'],
            'cv_path' => $request->file('cv')->store('scholarship-applications', 'public'),
            'status' => 'pending'
        ]);

        return redirect()->route('scholarships.show', $scholarship)
            ->with('success', 'Your scholarship application has been submitted successfully!');
    }
} 