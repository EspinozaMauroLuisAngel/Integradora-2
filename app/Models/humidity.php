<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class humidity extends Model
{
    use HasFactory;
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = "humiditie";
}
