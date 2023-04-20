<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\user as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class user extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = "user";
    public $timestamps = false;



    /* public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    } */

}
