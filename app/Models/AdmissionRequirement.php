<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionRequirement extends Model
{
    protected $guarded = [];

     public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
