<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id', 'salutation', 'gender', 'marital_status', 'experience', 'education', 'contact', 'region', 'province', 'city',
        'barangay', 'street', 'place_of_birth', 'dob', 'age', 'religion', 'passport_no', 'passport_date_of_issue', 'passport_place_of_issue',
        'profile_picture', 'professional_resume', 'valid_id', 'passport', 'birth_certificate', 'spouse_name', 'spouse_occupation',
        'children', 'father_name', 'mother_name', 'emergency_contact', 'emergency_relationship', 'emergency_contact_number', 'address'
    ];

    // Define the relationship with the Applicant model
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
