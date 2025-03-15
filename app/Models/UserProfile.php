<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'salutation', 'gender', 'marital_status', 'experience', 'education', 'email', 'contact',
        'region_id', 'province_id', 'city_id', 'barangay_id', 'street_text', 'place_of_birth', 'dob', 'religion',
        'passport_no', 'passport_date', 'passport_place', 'spouse_name', 'spouse_occupation', 'children', 'father_name',
        'mother_name', 'emergency_contact_name', 'emergency_contact_relationship', 'emergency_contact_number', 'profile_picture',
        'resume', 'valid_id', 'passport', 'birth_certificate'
    ];

    protected $casts = [
        'children' => 'array',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
