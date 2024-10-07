<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index2(){

        return view('front.index2');
    }
    public function index(){

        return view('front.index');
    }

    public function about(){

        return view('front.about');
    }

    public function join(){

        return view('front.joinow');
    }
    public function pickup(){

        return view('front.pickup');
    }
    public function events(){

        return view('front.events');
    }
    public function locations(){

        return view('front.locations');
    }
    public function classes(){

        return view('front.classes');
    }
    public function professionals(){

        return view('front.professionals');
    }
    public function contact(){

        return view('front.contact');
    }

}
