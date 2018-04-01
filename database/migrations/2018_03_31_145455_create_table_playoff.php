<?php 

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTablePlayoff
 */
class CreateTablePlayoff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playoffs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('challenger_team_id');
            $table->unsignedInteger('challenged_team_id');
            $table->foreign('challenger_team_id')->references('id')->on('teams');
            $table->foreign('challenged_team_id')->references('id')->on('teams');
            $table->integer('challenger_score');
            $table->integer('challenged_score');
            $table->integer('phase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playoffs');
    }
}
