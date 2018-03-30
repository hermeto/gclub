<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTableGroupResults
 */
class CreateTableGroupResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_results', function (Blueprint $table) {
            $table->unsignedInteger('challenger_team_id');
            $table->unsignedInteger('challenged_team_id');
            $table->unsignedInteger('group_id');
            $table->foreign('challenger_team_id')->references('team_id')->on('teams_groups_mapping');
            $table->foreign('challenged_team_id')->references('team_id')->on('teams_groups_mapping');
            $table->foreign('group_id')->references('group_id')->on('teams_groups_mapping');
            $table->integer('challenger_score');
            $table->integer('challenged_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_results');
    }
}
