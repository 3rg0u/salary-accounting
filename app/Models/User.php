<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['email', 'password', 'role'];

    const ADMIN = 'admin';
    const PROFESSOR = 'prof';
    const ACCOUNTANT = 'accountant';
    public function isAdmin()
    {
        return $this->role == self::ADMIN;
    }
    public function isProfessor()
    {
        return $this->role == self::PROFESSOR;
    }
    public function isAccountant()
    {
        return $this->role == self::ACCOUNTANT;
    }
}
