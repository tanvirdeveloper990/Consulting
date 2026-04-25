<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     protected $fillable = [
        'country', // <-- এখানে অবশ্যই থাকবে
        'title',
        'flag',
        'thumbnail',
        'status'
    ];


    public function study()
    {
        return $this->hasMany(Study::class, 'country_id');
    }

}
