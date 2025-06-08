<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{

  public function index()
  {
    $paths = Path::with(['pathdetails.course'])->get();
    $categories = Category::all();
    return view('user.roadmap.index', compact('paths', 'categories'));
  }

  public function guestIndex()
  {
    return view('guest.LearningPath.index');
  }

}
