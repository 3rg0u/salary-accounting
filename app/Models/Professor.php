<?php

namespace App\Models;

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

    public function setFullnameAttribute($value)
    {
        $this->attributes['fullname'] = ucwords($value);
    }


    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

}
