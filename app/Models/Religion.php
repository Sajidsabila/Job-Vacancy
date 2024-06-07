<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Religion extends Model
{

    use HasFactory;


    // Add fillable property to allow mass assignment
    protected $fillable = ['id', 'religion'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
