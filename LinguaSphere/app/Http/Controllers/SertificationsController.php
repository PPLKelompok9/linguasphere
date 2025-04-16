<?php

namespace App\Http\Controllers;

use App\Models\Sertification;
use Illuminate\Http\Request;

class SertificationController extends Controller
{
    public function index()
    {
        $sertifications = Sertification::with(['agency', 'category'])->latest()->get();
        return view('sertifications.index', compact('sertifications'));
    }

    public function show($slug)
    {
        $sertification = Sertification::where('slug', $slug)->with(['agency', 'category'])->firstOrFail();
        return view('sertifications.show', compact('sertification'));
    }
}
