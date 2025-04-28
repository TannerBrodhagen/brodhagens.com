@props(['photo'])
@once
    @push('preload')
        <link rel="preload" as="image" href="{{ asset('storage/' . $photo->photo) }}">
    @endpush
@endonce
<img src="{{ asset('storage/' . $photo->photo) }}" alt="{{ $photo->title }}" class="tile-image" />
