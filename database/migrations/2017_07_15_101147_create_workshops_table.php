<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('language', ['english', 'german', 'spanish', 'italian']);
            $table->enum('type', ['weekly', 'holydays']);
            $table->date('first_course');
            $table->date('last_course');
            $table->date('last_extension')->nullable();
            $table->integer('day')->nullable();
            $table->time('hour')->nullable();
            $table->string('holydays')->nullable();
            $table->string('partnership')->nullable();
            $table->string('stage_name')->nullable();
            $table->string('notes')->nullable();

            $table->unsignedInteger('level_id');
            $table->unsignedInteger('place_id')->nullable();
            $table->unsignedInteger('room_id')->nullable();
            $table->unsignedInteger('school_year_id')->nullable();

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('CASCADE');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('SET NULL');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('SET NULL');
            $table->foreign('school_year_id')->references('id')->on('school_years')->onDelete('SET NULL');
            
            $table->unignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshops');
    }
}
