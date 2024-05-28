<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevel extends Model
{
    use HasFactory;

    protected $guarded =[];


    use SoftDeletes;
 
    	protected $table = "education_levels";
   	protected $dates = ['deleted_at'];
}

