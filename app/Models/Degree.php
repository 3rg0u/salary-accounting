<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'abbreviation', 'coeff'];
    public $timestamps = false;


    public function profs()
    {
        return $this->hasMany(Professor::class, 'refs', 'abbreviation');
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
