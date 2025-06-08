<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = ['year_code', 'amount', 'description'];



    public function year()
    {
        return $this->belongsTo(AcademicYear::class, 'year_code', 'code');
    }
}
