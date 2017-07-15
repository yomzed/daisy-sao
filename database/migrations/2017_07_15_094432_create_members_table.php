<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $tabme->enum('status', ['member', 'original member', 'benefactor', 'teacher', 'interested']);
            $table->enum('gender', ['M', 'F', 'O']);
            $table->date('birthdate')->nullable();
            
            $table->string('address')->nullable();
            $table->integer('postal_code');
            $table->string('city');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->date('inscription_date')->nullable();
            $table->date('start_cotisation')->nullable();
            $table->date('end_cotisation')->nullable();

            $table->boolean('image_right')->default(false);
            $table->boolean('alone')->default(false);
            $table->string('allergies')->nullable();
            $table->text('notes')->nullable();

            $table->string('representative_name')->nullable();
            $table->string('representative_email')->nullable();
            $table->string('representative_phone')->nullable();
            $table->string('representative2_name')->nullable();
            $table->string('representative2_email')->nullable();
            $table->string('representative2_phone')->nullable();

            $table->unsignedInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('SET NULL');

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
        Schema::dropIfExists('members');
    }
}
