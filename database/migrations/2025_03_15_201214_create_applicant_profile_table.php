<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applicant_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('applicant_id'); // Foreign key for applicant
            $table->string('salutation')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('contact')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('street')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('passport_date_of_issue')->nullable();
            $table->string('passport_place_of_issue')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('professional_resume')->nullable();
            $table->string('valid_id')->nullable();
            $table->string('passport')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->json('children')->nullable(); // Store children's names as JSON
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_relationship')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_profiles');
    }
};
