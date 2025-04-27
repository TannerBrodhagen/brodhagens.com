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

    // simple Date format from date_taken
    public function getDateTakenAttribute($value)
    {
        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : null;
    }
    // simple Camera Make format from camera_make
    public function getCameraMakeAttribute($value)
    {   if(!$value) {
            return null;
        }
        // rename the camera make to a more readable format
        $cameraTranslation = [
            'OLYMPUS IMAGING CORP.' => 'Olympus',
        ];
        if (array_key_exists($value, $cameraTranslation)) {
            return $cameraTranslation[$value];
        }
        return $value;
    }
    
}
