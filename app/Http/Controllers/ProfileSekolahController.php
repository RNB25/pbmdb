<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        // return view('Module.Dashboard.main', compact('latestNews', 'programUnggulan', 'fasilitas', 'gallery','messages'));
        return view('Partials.profile.index');
    }
}
