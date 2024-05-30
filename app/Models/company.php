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
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}