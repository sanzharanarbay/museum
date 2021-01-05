<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Item;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items_count = Item::all()->count();
        $events_count = Event::all()->count();
        $gallery_count = Gallery::all()->count();
        $news_count = News::all()->count();
        return view('home', compact('items_count','events_count','gallery_count','news_count'));
    }
}
