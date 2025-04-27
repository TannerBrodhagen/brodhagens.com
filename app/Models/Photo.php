<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $casts = [
        'exif' => 'array',
    ];

    public function tags(){ // working with pivot table: photo_tags
        return $this->belongsToMany(Tag::class, 'photo_tags', 'photo_id', 'tag_id');
    }

    
    
}
