<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobSeeker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function education()
    {
        return $this->hasMany(education::class);
    }
    protected $fillable = [
        'religion_id', 'photo', 'nik', 'birth_date', 'first_name',
        'gender', 'last_name', 'address', 'phone', 'description'
    ];
}