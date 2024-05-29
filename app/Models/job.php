<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    use HasFactory;

    protected static function booted()
    {
        static::saving(function ($job) {
            if (empty ($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobcategory()
    {
        return $this->hasMany(JobCategory::class);
    }

    public function jobTime()
    {
        $this->hasMany(JobTimeType::class);
    }
}
