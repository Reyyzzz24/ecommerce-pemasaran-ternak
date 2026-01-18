<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
