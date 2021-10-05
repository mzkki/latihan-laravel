<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('choice_id', 0, 20)->unsigned();
            $table->bigInteger('user_id', 0, 20)->unsigned();
            $table->bigInteger('poll_id', 0, 20)->unsigned();
            $table->timestamps();
            $table->bigInteger('division_id', 0, 20)->unsigned();

            $table->foreign('choice_id')->references('id')->on('choices');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('poll_id')->references('id')->on('polls');
            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
