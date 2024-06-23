<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobseeker()
    {
        return $this->belongsTo(JobSeeker::class, "job_seeker_id");
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}