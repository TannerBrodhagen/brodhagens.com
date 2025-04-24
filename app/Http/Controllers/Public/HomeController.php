<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class HomeController extends Controller
{
    public function index()
    {
        $photos = Photo::all()->take(9);
        return view('home', compact('photos'));
    }
}