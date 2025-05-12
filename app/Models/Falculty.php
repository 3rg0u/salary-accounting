<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falculty extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'abbreviation'];
    public $timestamps = false;


    public function profs()
    {
        return $this->hasMany(Professor::class, 'falculty', 'abbreviation');
    }
}
