<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function buy(){
        return view('frontend.buy');
    }

    public function rent(){
        return view('frontend.rent');
    }

    public function villa(){
        return view('frontend.villa');
    }

    public function land(){
        return view('frontend.land');
    }

    public function commercial(){
        return view('frontend.commercial');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function detail(){
        return view('frontend.detail');
    }

    public function term(){
        return view('frontend.term');
    }

    public function privacy(){
        return view('frontend.privacy');
    }

    public function refund(){
        return view('frontend.refund');
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }
}

