<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class,'gallery_id');
    }
}
