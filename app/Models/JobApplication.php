<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'applicant_id',
        'job_title',
        'company_name',
        'status',
    ];

    /**
     * Get the job associated with the application.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the applicant associated with the application.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}