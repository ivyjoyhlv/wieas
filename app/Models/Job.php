<?php
// app/Models/Job.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Set the fillable fields
    protected $fillable = [
        'company_name',
        'job_title',
        'about_us',
        'profile_image',
        'banner_image',
        'country_origin',
        'industry_types',
        'additional_field',
        'year_of_establishment',
        'company_website',
        'company_vision',
        'map_location',
        'phone',
        'email',
    ];
}

