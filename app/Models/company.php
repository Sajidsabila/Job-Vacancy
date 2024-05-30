<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    use HasFactory;


    protected $fillable = [
        'company_name',
        'deskripsi',
        'logo',
        'email',
        'phone',
        'address',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}