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

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function company()
    {
        $this->hasOne(Company::class);
    }

    public function jobcategory()
    {
        $this->hasMany(JobCategory::class);
    }

    public function jobTime()
    {
        $this->hasMany(JobTimeType::class);
    }
}
