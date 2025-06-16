<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Translation\FileLoader;

class Professor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fullname', 'falculty', 'email', 'refs', 'pid'];



    public function getfalculty()
    {
        return $this->belongsTo(Falculty::class, 'falculty', 'abbreviation');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'refs', 'abbreviation');
    }


    public function classes($sem = null)
    {
        $semester = ($sem == null) ? Semester::opening() : Semester::firstWhere('code', $sem);
        return $semester->openedClasses()->where('prof_id', $this->pid)->get();
    }


    public function salaries($sem)
    {
        $semester = ($sem == null) ? Semester::opening() : Semester::firstWhere('code', $sem);
        return $semester->salaries()->where('prof_id', $this->pid)->get();
    }


    public function setFullnameAttribute($value)
    {
        $this->attributes['fullname'] = ucwords($value);
    }


    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

}
