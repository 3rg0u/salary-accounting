<?php

namespace App\Models;

use App\Http\Controllers\admin\CourseOfferingController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'code',
        'aca_year',
        'start',
        'end'
    ];


    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class, 'aca_year', 'code');
    }


    public function scopeOpening($query)
    {
        $now = Carbon::now();
        return $query->where('start', '<=', $now)->where('end', '>=', $now)->first();
    }


    public function openedClasses()
    {
        return $this->hasMany(OfferedCourse::class, 'sem_code', 'code');
    }



}
