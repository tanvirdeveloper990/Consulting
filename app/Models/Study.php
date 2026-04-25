<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
  use HasFactory; 

     protected $fillable = [
        'country_id',
        'short_description',
        'banner_image',
        'title',
        'description',
        'partner_university_title',
        'partner_university_count',
        'students_enrolled_title',
        'students_enrolled_count',
        'success_rate_title',
        'success_rate_count',
        'status'
    ];

   
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function studyItems()
    {
        return $this->hasMany(StudyItem::class, 'study_id');
    }

    public function topRateds()
    {
        return $this->hasMany(TopRated::class, 'study_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'study_id');
    }
    public function admissionRequirements()
    {
        return $this->hasMany(AdmissionRequirement::class, 'study_id');
    }
}
