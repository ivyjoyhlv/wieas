<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id'); // Foreign key to the jobs table
            $table->unsignedBigInteger('applicant_id'); // Foreign key to the applicants table
            $table->string('job_title'); // Job title from the job table
            $table->string('company_name'); // Company name from the job table
            $table->string('status')->default('Pending'); // Application status (e.g., Pending, Approved, Rejected)
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}