<?php
$tags = App\Models\Tag::all();
?>

<nav>
    <ul>
        <li>
            <a href="{{ route('home') }}">
                Home
            </a>
            <h5>Tags</h5>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tags', $tag->slug) }}">
                    {{ $tag->name }}
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
