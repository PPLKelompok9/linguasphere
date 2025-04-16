<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sertification;
use Illuminate\Http\Request;

class SertificationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $sertifications = Sertification::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Sertifications.index', compact('sertifications', 'categories'));
    }

    public function show($slug)
    {
        $sertification = Sertification::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        return view('Sertifications.show', compact('sertification'));
    }
}