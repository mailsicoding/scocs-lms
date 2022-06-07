<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'phone_number',
        'username',
        'email',
        'password',
    ];
}
