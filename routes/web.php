<?php
use Illuminate\Support\Facades\Route;

// get view home
Route::get('/', 'App\Http\Controllers\Public\HomeController@index')->name('home');

// use the Photo Model to make routes for 'photo_id'
Route::get('/photos/{photo_id}', function ($photo_id) {
    return view('photos', ['photo_id' => $photo_id]);
})->name('photos');

// use the Tag Model to make routes for tags 'name'
Route::get('/tags/{tag}', 'App\Http\Controllers\Public\TagController@index')->name('tags');

// use the Photo Model to make routes for 'camera_make'
Route::get('/camera/{camera_make}', function ($camera_make) {
    return view('camera', ['camera_make' => $camera_make]);
})->name('camera');

// use the Photo Model to make routes for 'camera_model'
Route::get('/camera/{camera_make}/{camera_model}', function ($camera_make, $camera_model) {
    return view('camera', ['camera_make' => $camera_make, 'camera_model' => $camera_model]);
})->name('camera.model');

// use the Photo Model to make routes for 'camera_lens'
Route::get('/lens/{camera_lens}', function ($camera_make, $camera_model, $camera_lens) {
    return view('camera', ['camera_make' => $camera_make, 'camera_model' => $camera_model, 'camera_lens' => $camera_lens]);
})->name('camera.lens');


