<?php

namespace App\Http\Controllers\PendaftaranSiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPendaftaranSiswaController extends Controller
{
    public function index()
    {
        return view('Module.PendaftaranSiswa.main');
    }
}
