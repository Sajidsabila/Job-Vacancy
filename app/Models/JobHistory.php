<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'interview_date',
    ];
    public function jobseeker()
    {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}
