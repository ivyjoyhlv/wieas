<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('full_name');
            $table->string('salutation')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('email');
            $table->string('contact');
            $table->string('region');
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('street')->nullable();
            $table->string('place_of_birth');
            $table->date('dob');
            $table->integer('age');
            $table->string('religion');
            $table->string('passport_no')->nullable();
            $table->date('passport_date_of_issue')->nullable();
            $table->string('passport_place_of_issue')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('occupation')->nullable();
            $table->string('name_of_father')->nullable();
            $table->string('name_of_mother')->nullable();
            $table->string('person_to_notify')->nullable();
            $table->string('relationship_to_notify')->nullable();
            $table->string('contact_to_notify')->nullable();
            $table->string('address_to_notify')->nullable();
            $table->string('cv_resume')->nullable();
            $table->string('valid_id')->nullable();
            $table->string('passport_file')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_information');
    }
}
