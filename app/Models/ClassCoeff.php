<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCoeff extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = ['year_code', 'upperbound', 'lowerbound'];



    public static function evalCoeff($num)
    {
        $coeff = AcademicYear::opening()->cls_coeff;

        $upper = $coeff->upperbound;
        $lower = $coeff->lowerbound;

        if ($num <= $lower - 20)
            $index = 0;
        elseif ($num < $upper - 20)
            $index = 1;
        elseif ($num < $upper - 10)
            $index = 2;
        elseif ($num < $upper)
            $index = 3;
        elseif ($num < $upper + 10)
            $index = 4;
        elseif ($num < $upper + 20)
            $index = 5;
        elseif ($num >= $upper + 20)
            $index = 6;
        $nums = [-0.3, -0.2, -0.1, 0, 0.1, 0.2, 0.3];

        return $nums[$index];
    }


    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'year_code', 'code');
    }
}
