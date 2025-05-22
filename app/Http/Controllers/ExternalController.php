<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{

    public function courses(){
        return view('front.course');
    }



    public function path()
    {
        return view('external.path');
    }
}