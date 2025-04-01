<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'password',
        'email_verified_at'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $dates = [
        'email_verified_at'
    ];
}