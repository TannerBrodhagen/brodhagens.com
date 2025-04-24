<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($tag)
    {
        $photos = Photo::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->take(3)->get();
        return view(
            'tags',
            [
                'photos' => $photos,
                'tag' => $tag,
            ]
        );
    }
}
