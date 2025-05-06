<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function courses()
    {
        return view('dashboard.courses');
    }

    public function path()
    {
        return view('external.path');
    }
}