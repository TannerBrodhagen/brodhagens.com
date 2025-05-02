<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Tag extends Model {
    use CrudTrait;
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function photos() {
        return $this->belongsToMany(Photo::class, 'photo_tags');
    }

    // create a slug from the name as an attribute
    public function getSlugAttribute() {
        return Str::slug($this->name);
    }
    // create a route key for the slug
    public function getRouteKeyName() {
        return 'slug';
    }

}
