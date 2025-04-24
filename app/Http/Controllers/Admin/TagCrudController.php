<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TagCrudController extends CrudController {
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        CRUD::setModel(\App\Models\Tag::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tag');
        CRUD::setEntityNameStrings('tag', 'tags');
    }

    protected function setupListOperation() {
        // sorting
        CRUD::orderBy('name');
        // columns
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('description');

    }

    protected function setupCreateOperation() {
        CRUD::setValidation(TagRequest::class);
        // name
        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
        ]);
        // description
        CRUD::addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
        ]);
    }

    protected function setupUpdateOperation() {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation() {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::addColumn([
            'name' => 'description',
            'type' => 'custom_html',
            'label' => 'Description',
            'value' => function ($entry) {
                return $entry->description;
            },
            'escaped' => false,
        ]);
    }
}
