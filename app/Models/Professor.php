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
}
