<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkskopMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_member', function (Blueprint $table) {
            $table->unsignedInteger('workshop_id');
            $table->unsignedInteger('member_id');
            $table->unique(['workshop_id', 'member_id']);
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('CASCADE');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('CASCADE');
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
        Schema::dropIfExists('workshop_member');
    }
}
