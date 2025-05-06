<?php

namespace App\Http\Controllers\Pretest;

use App\Http\Controllers\Controller;
use App\Models\Course;

class PretestController extends Controller
{
  public function index()
  {
    $courses = Course::all();

    return view('pretest.main', compact('courses'));
  }

  public function show($slug)
  {
    // Cari course berdasarkan slug
    $course = Course::where('slug', $slug)->firstOrFail();

    // Kirim data course ke view
    return view('pretest.show', compact('course'));
  }
}