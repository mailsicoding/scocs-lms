<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'class_id',
        'first_name',
        'last_name',
        'image',
        'date_of_birth',
        'phone_number',
        'cnic_number',
        'roll_no',
        'username',
        'email',
        'password',
    ];

}
