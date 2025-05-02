@props(['photo'])


@php
    $photo = $photo ?? null;
@endphp

@if ($photo->photo)
    <article class="tile">
        <div class="tile-left">
            <button class="photoButton" onclick="togglePhotoInfo(this)">
                <span class="material-symbols-outlined">info</span>
            </button>
            <x-photo :photo="$photo" />
        </div>
        <div class="tile-right">
            <button class="photoButton" onclick="togglePhotoInfo(this)">
                <span class="material-symbols-outlined">close</span>
            </button>
            <x-photo-info :photo="$photo" />
        </div>
    </article>
    
@endif
