<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNickelScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nickel_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('food');
            $table->string('category')->nullable(); # Example of a modifier
            $table->integer('nickel_point_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nickel_scores');
    }
}
