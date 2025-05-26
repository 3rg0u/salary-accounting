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


    public function blfalculty()
    {
        return $this->belongsTo(Falculty::class, 'falculty', 'abbreviation');
    }



    public function ongoingclasses($semester_code = null)
    {
        $semester = ($semester_code == null) ? Semester::opening() : Semester::where('code', $semester_code)->get()->first();
        return OfferedCourse::where('course_code', $this->code)->where('sem_code', $semester->code)->get();
    }

    public function openedclasses()
    {
        return $this->hasMany(OfferedCourse::class, 'course_code', 'code');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

}
