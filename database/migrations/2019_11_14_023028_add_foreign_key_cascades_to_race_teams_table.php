<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCascadesToRaceTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('race_teams', function (Blueprint $table) {
            $table->dropForeign(['race_id']);
            $table->foreign('race_id')
                ->references('id')
                ->on('races')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->dropForeign(['team_id']);
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
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
        // yeah, no
    }
}
