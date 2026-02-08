<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class HomeController extends Controller
{
    public function index()
    {
        // Pick the newest 9, then randomize display order.
        $photos = Photo::query()
            ->with('tags')
            ->orderByDesc('date_taken')
            ->orderByDesc('created_at')
            ->limit(9)
            ->get()
            ->shuffle()
            ->values();
        return view('home', compact('photos'));
    }
}