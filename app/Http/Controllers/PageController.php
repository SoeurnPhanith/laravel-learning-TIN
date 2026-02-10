<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function homePage(){
        return view('page.home_page');
    }

    public function aboutPage(){
        return view('page.about_page');
    }

    public function servicePage(){
        return view('page.service_page');
    }

    public function contactPage(){
        return view('page.contact_page');
    }
}
