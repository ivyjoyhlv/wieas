<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProfession extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'language_spoken',
        'company',
        'references',
        'contact',
        'address',
        'position',
        'salary',
        'date_from',
        'date_to',
        'school_name',
        'location',
        'inclusive_year',
        'course',
        'signature',
    ];

    // Define the relationship to the User model (applicant)
    public function user()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
}
