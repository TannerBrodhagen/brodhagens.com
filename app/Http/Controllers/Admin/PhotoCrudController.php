<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\PhotoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PhotoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Photo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/photo');
        CRUD::setEntityNameStrings('photo', 'photos');
    }
    protected function setupListOperation()
    {
        
        /* COLUMNS */
        CRUD::column('photo_id');
        CRUD::column('title');
        CRUD::column('photo')->type('image')->disk('public')->height('150px')->width('150px');
        CRUD::column('tags')->type('select_multiple')->label('Tags')->entity('tags')->attribute('name')->model('App\Models\Tag');
       
    }
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PhotoRequest::class);

        CRUD::field([   // Upload
            'name'      => 'photo',
            'label'     => 'Photo',
            'type'      => 'upload',
            'withFiles' => [
                'disk'      => 'public',
                'path'      => 'photos',
            ],
            'hint'      => 'Max. 2MB in JPEG or JPG format',
        ]);
        CRUD::addField([
            'name' => 'tags',
            'label' => 'Tags',
            'type' => 'select_multiple',
            'attribute' => 'name',
            'model' => "App\Models\Tag",
            'pivot' => true,
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), // sort by name
        ]);
        CRUD::field('title');
        CRUD::field('description')->type('textarea');
        CRUD::field('place');
        CRUD::field('city');
        CRUD::field('state');
        CRUD::field('country')->default('United States');


        //CRUD::setFromDb(); // set fields from db columns.



        // Saving Event
        // use the file name as the photo_id
        Photo::creating(function ($entry) {
            $entry->photo_id = substr($entry->photo, 7);
            $photo_path = storage_path('app/public/'.$entry->photo);
            $exif = exif_read_data(
                $photo_path,
                'EXIF',  
            );
            if(!$exif) {
                return;
            }
            //dd($exif);
            // trim the spaces from the values
            $exif =  array_map(function($value) {
                    return is_string($value) ? trim($value) : $value;
                }, $exif);
            $entry->date_taken = $exif['DateTimeOriginal'];
            $entry->camera_make = $exif['Make'] ?? NULL;
            $entry->camera_model = $exif['Model'] ?? NULL;
            $entry->camera_lens = $exif['Lens Model'] ?? ($exif['UndefinedTag:0xA434'] ?? NULL);
            

            $entry->exif = json_encode($exif);
        });
    }
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupDeleteOperation()
    {
        CRUD::field('photo')->type('upload')->withFiles();
    }
    // show
    protected function setupShowOperation()
    {
        //CRUD::setFromDb(); // fields
        CRUD::column('photo')
        ->type('image')
        ->disk('public')
        ->height('1000px')
        ->width('1000px');
        CRUD::column('photo_id')->type('text');
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('place');
        CRUD::column('country');
        CRUD::column('city');
        CRUD::column('state');
        CRUD::column('latitude');
        CRUD::column('longitude');
        CRUD::column('exif');
        CRUD::column('date_taken');
        CRUD::column('created_at');
    }
}
