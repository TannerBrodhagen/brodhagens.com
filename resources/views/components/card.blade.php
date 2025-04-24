@props(['photo'])


@php
    $photo = $photo ?? null;
@endphp

@if ($photo)
    <article class="tile">
        <div class="tile-left">
            @if ($photo->photo)
                <x-photo :photo="$photo" />
            @else
                <p>No image available</p>
            @endif
        </div>
        <div class="tile-right">
            <x-photo-info :photo="$photo" />
        </div>
    </article>
@endif
