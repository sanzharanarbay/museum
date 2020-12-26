<?php

namespace App\Http\Controllers;

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

    public function gallery(){
        return view('modules.front.pages.gallery');
    }

    public function events(){
        return view('modules.front.pages.events');
    }

    public function museumitems(){
        return view('modules.front.pages.museumitems');
    }

    public function news(){
        return view('modules.front.pages.news');
    }

}

