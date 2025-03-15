<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_info';

    protected $fillable = [
        'user_id',
        'full_name',
        'salutation',
        'gender',
        'marital_status',
        'experience',
        'education',
        'email',
        'contact',
        'region',
        'province',
        'city',
        'barangay',
        'street',
        'place_of_birth',
        'date_of_birth',
        'age',
        'religion',
        'passport_no',
        'passport_issue_date',
        'passport_place_of_issue',
        'spouse_name',
        'spouse_occupation',
        'children_names',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_phone',
        'address',
        'profile_picture',
        'professional_resume',
        'valid_id',
        'passport',
        'birth_certificate'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
