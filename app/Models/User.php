<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public static function clientID() { return 'zlZvvafCQMafsdT2Sw0OJw'; }
    public static function clientSecret() { return 'R0Y8Dq1QEgQPsLn8sa7rRgRsqzSfJCZP'; }
    public static function accountID() { return 'jB0kYTlFSU6LVLQjlFyJUg'; }
    public function pinnedJobs()
{
    return $this->hasMany(Pinned::class);
}
public function applicant()
    {
        return $this->hasOne(UserApplicant::class);
    }

    
}
