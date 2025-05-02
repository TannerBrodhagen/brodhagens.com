<?php
$tags = App\Models\Tag::withCount('photos')
->having('photos_count', '>', 0)
->get();
?>

<nav>
    <ul>
        <li>
            <a href="{{ route('home') }}">
                Home
            </a>
            <h5>Collections</h5>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tags', $tag->slug) }}">
                    {{ $tag->name }} ({{ $tag->photos_count }})
                </a>
            </li>
        @endforeach
        
        {{-- <li>
            <a href="{{ route('about') }}">
                About
            </a>
        </li> --}}
    </ul>
</nav>
