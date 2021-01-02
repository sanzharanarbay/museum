<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Item;
use App\Models\News;
use FG\ASN1\Universal\Sequence;
use FreeDSx\Asn1\Encoders;
use Illuminate\Http\Request;
use phpseclib\File\ASN1;


class DemoController extends Controller
{

    // index page
    public function index(){
        return view('modules.front.pages.welcome');
    }

    public function about(){
        return view('modules.front.pages.about');
    }

    public function contact(){
        return view('modules.front.pages.contact');
    }

    public function galleryitems(){
        $galleries = Gallery::orderBy('id','DESC')->get();
        return view('modules.front.pages.gallery', compact('galleries'));
    }

    public function events(){
        $events = Event::all();
        return view('modules.front.pages.events', compact('events'));
    }

    public function museumitems(){
        $items = Item::orderBy('id','DESC')->get();
        return view('modules.front.pages.museumitems', compact('items'));
    }

    public function announcements(){
        $announcements = News::orderBy('id', 'DESC')->get();
        return view('modules.front.pages.news', compact('announcements'));
    }

    public function virtualtour(){
        return view('modules.front.pages.tour');
    }

    public function singleEvent($unique_id){
        $event = Event::with('user')->where('unique_id', $unique_id)->firstOrFail();
        return view('modules.front.pages.single-event', compact('event'));
    }
}

