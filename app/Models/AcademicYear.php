<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'code',
        'start',
        'end'
    ];



    public function semesters()
    {
        return $this->hasMany(Semester::class, 'aca_year', 'code');
    }

    public function wage()
    {
        return $this->hasOne(Wage::class, 'year_code', 'code');
    }


    public function cls_coeff()
    {
        return $this->hasOne(ClassCoeff::class, 'year_code', 'code');
    }


    public function salaries()
    {
        return $this->hasMany(Salary::class, 'year_code', 'code');
    }




    public function scopeOpening($query)
    {
        $now = Carbon::now();
        return $query->where('start', '<=', $now)->where('end', '>=', $now)->first();
    }
}
