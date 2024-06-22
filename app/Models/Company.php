<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    use HasFactory;


    protected $fillable = [
        'id',
        'company_name',
        'deskripsi',
        'logo',
        'email',
        'phone',
        'addres',
        'status'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
