<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    use CrudTrait;
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function photos() {
        return $this->belongsToMany(Photo::class, 'photo_tag');
    }

}
