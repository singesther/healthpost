<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    Public function index() {
        return view('index');
        
    }
    Public function about() {
        return view('home');
    }
}
