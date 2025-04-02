<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantProfessionsTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_professions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('users')->onDelete('cascade');  // assuming users table has the applicant data
            $table->string('language_spoken')->nullable();
            $table->string('company')->nullable();
            $table->string('references')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->string('salary')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('school_name')->nullable();
            $table->string('location')->nullable();
            $table->string('inclusive_year')->nullable();
            $table->string('course')->nullable();
            $table->string('signature')->nullable(); // file path for signature
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_professions');
    }
}
