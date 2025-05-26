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


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'code');
    }


    public function professor()
    {
        return $this->belongsTo(Professor::class, 'prof_id', 'pid');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'sem_code', 'code');
    }


}
