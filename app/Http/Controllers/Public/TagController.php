<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($slug)
    {
        // Resolve the Tag model using the slug attribute
        $tag = Tag::where('name', 'like', str_replace('-', ' ', $slug))->firstOrFail();

        // Get the photos associated with the tag
        $photos = Photo::query()
            ->with('tags')
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->orderByDesc('date_taken')
            ->orderByDesc('created_at')
            ->get();

        return view('tags', compact('photos', 'tag'));
    }
}