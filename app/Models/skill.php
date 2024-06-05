<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobseeker()
    {
        return $this->belongsTo(JobSeeker::class, "job_seeker_id");
    }
}
