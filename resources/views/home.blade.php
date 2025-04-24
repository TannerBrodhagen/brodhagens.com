<x-layout>
    <x-slot:title>Home</x-slot:title>
    <h1>Home</h1>
    <section class="container">
        @if($photos->count() > 0)
            <div class="tiles">
                @foreach ($photos as $photo)
                    <x-card :photo="$photo" />
                @endforeach
            </div>
        @else
            <h2>No photos found</h2>
        @endif
    </section>
</x-layout>
