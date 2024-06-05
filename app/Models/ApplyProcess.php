<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyProcess extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    use SoftDeletes;
 
    protected $table = "apply_processes";
   	protected $dates = ['deleted_at'];
}
