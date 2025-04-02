<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_jobs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('job_title');
            $table->text('about_us');
            $table->binary('profile_image');
            $table->binary('banner_image');
            $table->string('country_origin');
            $table->string('industry_types');
            $table->string('additional_field');
            $table->date('year_of_establishment');
            $table->string('company_website')->nullable();
            $table->text('company_vision');
            $table->string('phone');
            $table->string('email');
            $table->boolean('is_active')->default(true); // Active status
            $table->boolean('is_archived')->default(false); // Archived status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
