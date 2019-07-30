<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageRiderScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_rider_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stage_id');
            $table->unsignedInteger('race_rider_id');
            $table->unsignedInteger('stage_scoring_category_id');
            $table->timestamps();

            $table->foreign('stage_id')
                ->references('id')
                ->on('stages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('race_rider_id')
                ->references('id')
                ->on('race_riders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('stage_scoring_category_id')
                ->references('id')
                ->on('stage_scoring_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_rider_scores');
    }
}
