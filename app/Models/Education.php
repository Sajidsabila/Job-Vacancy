<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobseeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function educationlevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');

    }
}
