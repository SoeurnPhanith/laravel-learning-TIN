<?php

use Illuminate\Support\Facades\Route;

//------------All Route for blade-template file
Route::group([], function(){

    Route::get('/', function(){return view('pages.home');});
    Route::get('/about', function(){return view('pages.about');});
    Route::get('/service', function(){return view('pages.service');});
    Route::get('/contact', function(){return view('pages.contact');});
    Route::get('/other', function(){return view('pages.other');});
    
});