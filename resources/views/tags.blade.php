@php
    $tag = $tag ?? null;
    $photos = $photos ?? [];
@endphp
@if ($tag)
    <x-layout>
        <x-slot:title>{{ $tag->name }}</x-slot:title>
        <h1>{{ $tag->name }}</h1>
        <section class="container">
            @if ($photos->count() > 0)
                <div class="tiles">
                    @foreach ($photos as $photo)
                        <x-card :photo="$photo" />
                    @endforeach
                </div>
            @else
                <div class="no-photos">
                    <h2>No photos found</h2>
                </div>
            @endif
        </section>
    </x-layout>
@else
    <h2>No tag found</h2>
@endif
