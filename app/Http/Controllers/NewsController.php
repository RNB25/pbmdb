<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\ProgramUnggulan;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->paginate(9);
        $programUnggulan = News::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->paginate(9);
        $latestNews = News::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->take(3)
            ->get();

        $programUnggulan = ProgramUnggulan::latest()->take(6)->get();


        $fasilitas = Facility::latest()->take(6)->get();

        $gallery = Gallery::latest()->take(6)->get();

        $messages = Message::all();

        return view('Module.Dashboard.news.index', compact('news','latestNews', 'programUnggulan', 'fasilitas', 'gallery','messages'));
    }


    public function show(News $news)
    {
        if (!$news->is_published) {
            abort(404);
        }

        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->orderBy('published_date', 'desc')
            ->take(3)
            ->get();

        return view('Module.news.show', compact('news', 'relatedNews'));
    }
}
