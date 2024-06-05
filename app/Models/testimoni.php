<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';
    protected $fillable = [
        'name', 'job', 'quote', 'image'
    ];

    public function job_seekers()
    {
        return $this->hasOne(JobSeeker::class);
    }
}