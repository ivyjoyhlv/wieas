<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_profiles', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('applicant_id')->nullable(); // Foreign key to applicants table, nullable
            $table->string('full_name')->default('');  // Default empty string
            $table->string('salutation')->default('N/A');  // Default "N/A"
            $table->string('gender')->default('N/A');  // Default "N/A"
            $table->string('marital_status')->default('N/A');  // Default "N/A"
            $table->string('experience')->default('N/A');  // Default "N/A"
            $table->string('education')->default('N/A');  // Default "N/A"
            $table->string('email')->default('N/A');
            $table->string('contact')->default('N/A');
            $table->string('region')->default('N/A');  // Default "N/A"
            $table->string('province')->default('N/A');  // Default "N/A"
            $table->string('city')->default('N/A');  // Default "N/A"
            $table->string('barangay')->default('N/A');  // Default "N/A"
            $table->string('street')->default('N/A');  // Default "N/A"
            $table->string('place_of_birth')->default('N/A');  // Default "N/A"
            $table->date('dob')->nullable(); // Don't set a default value for date
            $table->integer('age')->default(0);  // Default to 0
            $table->string('religion')->default('N/A');  // Default "N/A"
            $table->string('passport_no')->default('N/A');  // Default "N/A"
            $table->string('passport_place_of_issue')->default('N/A');  // Default "N/A"
            $table->date('passport_date_of_issue')->nullable();  // Default current date should be handled in the controller or default value logic
            $table->string('spouse_name')->default('N/A');  // Default "N/A"
            $table->string('spouse_occupation')->default('N/A');  // Default "N/A"
            
            // Updated: Remove default for `children_names` as it's a TEXT column
            $table->text('children_names')->nullable();  // Make it nullable, don't set a default value
        
            $table->string('father_name')->default('N/A');  // Default "N/A"
            $table->string('mother_name')->default('N/A');  // Default "N/A"
            $table->string('emergency_contact')->default('N/A');  // Default "N/A"
            $table->string('emergency_relationship')->default('N/A');  // Default "N/A"
            $table->string('emergency_contact_number')->default('N/A');  // Default "N/A"
            $table->string('address')->default('N/A');  // Default "N/A"
            $table->string('profile_picture')->nullable();
            $table->string('professional_resume')->nullable();
            $table->string('valid_id')->nullable();
            $table->string('passport')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->timestamps();
        
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_profiles');
    }
};
