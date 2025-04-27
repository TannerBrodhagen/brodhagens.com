@props(['photo'])

<div class="photo-info">
    <h2>{{ $photo->title }}</h2>
    <p>{{ $photo->description }}</p>
    <div class="camera-details">
        @if ($photo->camera_make)
            <span>
                <span class="material-symbols-outlined">
                    photo_camera
                </span>
                {{ $photo->camera_make }} {{ $photo->camera_model }}
            </span>
        @endif
        @if($photo->camera_lens)
            <span>
                <span class="material-symbols-outlined">
                    camera
                </span>
                {{ $photo->camera_lens }}
            </span>
        @endif
        
    </div>
    <div class="photo-info-details">
        <span>
            <span class="material-symbols-outlined">
                today
                </span>
            {{ $photo->date_taken }}
        </span>
        @if ($photo->place)
            <span>
                <span class="material-symbols-outlined">
                    local_see
                    </span>
                {{ $photo->place }}
            </span>
        @endif
        @if ($photo->city)
            <span>
                <span class="material-symbols-outlined">
                    location_on
                </span>
                {{ $photo->city }}, {{ $photo->state }} {{ $photo->country }}
            </span>
        @endif
    </div>
    @if ($photo->tags->count() > 0)
        <div class="photo-info-tags">
            <span class="material-symbols-outlined">
                bookmark
                </span>
                <span>
            @foreach ($photo->tags as $tag)
                <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a>@if (!$loop->last)<span>, </span>@endif
            @endforeach
            </span>
        </div>
    @endif
    @if ($photo->exif)
            <x-photo-metadata :exif="$photo->exif" />
        @endif
</div>
