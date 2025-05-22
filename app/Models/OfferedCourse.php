<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferedCourse extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'code',
        'course_code',
        'sem_code',
        'prof_id',
        'std_nums',
        'coeff'
    ];
}
