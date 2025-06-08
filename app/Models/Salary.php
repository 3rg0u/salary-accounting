<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = ['year_code', 'sem_code', 'prof_id', 'cls_code', 'amount'];



    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'year_code');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'sem_code', 'code');
    }

    public function class()
    {
        return $this->belongsTo(OfferedCourse::class, 'cls_code', 'code');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'prof_id', 'pid');
    }
}


