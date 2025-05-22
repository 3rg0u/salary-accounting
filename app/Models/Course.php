<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'code',
        'falculty',
        'name',
        'coeff',
        'cls_hours',
        'cred_hours'
    ];

}
