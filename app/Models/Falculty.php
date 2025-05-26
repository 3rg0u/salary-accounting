<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falculty extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'abbreviation', 'description'];
    public $timestamps = false;


    public function professors()
    {
        return $this->hasMany(Professor::class, 'falculty', 'abbreviation');
    }


    public function courses()
    {
        return $this->hasMany(Course::class, 'falculty', 'abbreviation');
    }


    public function openedclasses($semester_code = null)
    {

        $semester = ($semester_code == null) ? Semester::opening() : Semester::where('code', $semester_code)->get()->firstOrFail();
        $codes = $this->courses()->pluck('code');
        return OfferedCourse::whereIn('course_code', $codes)->get();
    }

    public function openedcourses($semester_code = null)
    {
        $semester = ($semester_code == null) ? Semester::opening() : Semester::where('code', $semester_code)->get()->firstOrFail();
        $codes = $this->courses()->pluck('code');
        return Course::whereIn('code', $codes)->whereHas('openedclasses', function ($query) use ($semester) {
            $query->where('sem_code', $semester->code);
        })->get();
    }
    public function setFullnameAttribute($value)
    {
        $this->attributes['fullname'] = ucwords($value);
    }

    public function setAbbreviationAttribute($value)
    {
        $this->attributes['abbreviation'] = strtoupper($value);
    }



}
