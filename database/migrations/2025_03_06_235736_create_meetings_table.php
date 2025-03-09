<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_meetings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_code')->unique(); // Unique meeting code
            $table->string('zoom_meeting_id'); // Zoom meeting ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
