<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    // Specify the table if it's not the plural of the model name
    protected $table = 'orders';

    // Specify which fields are mass assignable
    protected $fillable = [
        'job_id',
        'package_id',
        'price',
        'status',
    ];

    // Define the relationship with the Job model
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Define the relationship with the Package model
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
