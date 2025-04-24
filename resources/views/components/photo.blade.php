@props(['photo'])
<img src="{{ asset('storage/' . $photo->photo) }}" alt="{{ $photo->title }}" class="tile-image" />