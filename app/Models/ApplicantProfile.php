<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
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
        'dob',
        'age',
        'religion',
        'passport_no',
        'passport_place_of_issue',
        'passport_date_of_issue',
        'spouse_name',
        'spouse_occupation',
        'children_names',
        'father_name',
        'mother_name',
        'emergency_contact',
        'emergency_relationship',
        'emergency_contact_number',
        'address',
        'profile_picture',
        'professional_resume',
        'valid_id',
        'passport',
        'birth_certificate',
    ];

    // Define relationship to applicants table
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
