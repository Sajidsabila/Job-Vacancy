<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    // Add fillable property to allow mass assignment
    protected $fillable = ['id', 'religion'];
}