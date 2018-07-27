<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_riders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('race_id');
            $table->foreign('race_id')->references('id')->on('races');
            $table->unsignedInteger('rider_id');
            $table->foreign('rider_id')->references('id')->on('riders');
            $table->unsignedInteger('race_team_id');
            $table->foreign('race_team_id')->references('id')->on('race_teams');
            $table->integer('cost');
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
        Schema::dropIfExists('race_riders');
    }
}
