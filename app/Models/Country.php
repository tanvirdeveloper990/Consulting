<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
 protected $guarded = [];


    public function study()
    {
        return $this->hasMany(Study::class, 'country_id');
    }

}
