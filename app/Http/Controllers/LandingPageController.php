<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {


        $latestNews = News::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->take(3)
            ->get();
        

        return view('Module.Dashboard.main', compact('latestNews'));
    }
}
