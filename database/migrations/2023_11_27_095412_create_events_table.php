<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            // $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('name', 25);
            $table->string('place', 75);
            $table->string('description', 300);
            $table->string('type', 10)->default('meeting')->comment('meeting, qna, conf, webinar');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
