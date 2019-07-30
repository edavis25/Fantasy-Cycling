<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCascadesToRaceRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('race_riders', function (Blueprint $table) {
            $table->dropForeign(['race_id']);
            $table->foreign('race_id')
                ->references('id')
                ->on('races')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->dropForeign(['rider_id']);
            $table->foreign('rider_id')
                ->references('id')
                ->on('riders')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->dropForeign(['race_team_id']);
            $table->foreign('race_team_id')
                ->references('id')
                ->on('race_teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @note these were the original foreign constraints applied when table created (aka. no cascades) */
        Schema::table('race_riders', function (Blueprint $table) {
            $table->dropForeign(['race_id']);
            $table->foreign('race_id')
                ->references('id')
                ->on('races');

            $table->dropForeign(['rider_id']);
            $table->foreign('rider_id')
                ->references('id')
                ->on('riders');

            $table->dropForeign(['race_team_id']);
            $table->foreign('race_team_id')
                ->references('id')
                ->on('race_teams');
        });
    }
}
