<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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
                $slug = Str::slug($job->title);

                $randomString = Str::random(5);
                $job->slug = "{$slug}-{$randomString}";
            }
        });
    }
    public function company()
    {

        return $this->belongsTo(Company::class, 'company_id', );

    }
    public function requirements()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }
    public function jobcategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function jobTime()
    {
        // $this->hasMany(JobTimeType::class);
        return $this->belongsTo(JobTimeType::class, 'job_time_type_id');
    }


}
