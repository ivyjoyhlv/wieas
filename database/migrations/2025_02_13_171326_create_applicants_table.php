<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); // Adds 'remember_token' column for "remember me" functionality
            $table->timestamps();
            
            // Optional index for better performance on email verification queries
            $table->index('email_verified_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}