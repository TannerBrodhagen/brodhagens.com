@props(['photo'])
@once
    @push('preload')
        <link rel="preload" fetchpriority="high" as="image" href="{{ asset('storage/' . $photo->photo) }}">
    @endpush
@endonce
<img src="{{ asset('storage/' . $photo->photo) }}" alt="{{ $photo->title }}" class="tile-image" />
