<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Item;
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
        return view('modules.front.pages.events');
    }

    public function museumitems(){
        $items = Item::orderBy('id','DESC')->get();
        return view('modules.front.pages.museumitems', compact('items'));
    }

    public function announcements(){
        return view('modules.front.pages.news');
    }

    public function virtualtour(){
        return view('modules.front.pages.tour');
    }
}

