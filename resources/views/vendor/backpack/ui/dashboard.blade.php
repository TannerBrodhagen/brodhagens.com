@extends(backpack_view('blank'))
@extends(backpack_view('blank'))

@php
    use App\Models\Photo;
    use App\Models\Tag;

    $photoCount = Photo::count();
    $tagCount = Tag::count();

    // Add a widget to display the photo and tag count
    $widgets['before_content'][] = [
        'type'  => 'div',
        'class' => 'row',
        'content' => [
            [
                'type'        => 'card',
                'content'     => [
                    'header' => 'Photos',
                    'body'   => "There are currently <strong>{$photoCount}</strong> photos in the database.",
                ],
            ],
            [
                'type'        => 'card',
                'content'     => [
                    'header' => 'Tags',
                    'body'   => "There are currently <strong>{$tagCount}</strong> tags in the database.",
                ],
            ],
        ],
    ];
@endphp

@section('content')
@endsection