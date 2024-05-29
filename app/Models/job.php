<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'job_category_id',
        'job_time_type_id',
        'company_id',
        'title',
        'description',
        'salary',
        'job_location',
        'requirement_id', // Pastikan requirement_id termasuk dalam $fillable
        'slug'
    ];
    protected $casts = [
        'requirement_id' => 'array',  // Cast requirement_id to array
    ];

    protected static function booted()
    {
        static::saving(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function requirements()
    {
        return $this->belongsToMany(requirement::class); // Gunakan hasMany karena relasinya one-to-many
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
