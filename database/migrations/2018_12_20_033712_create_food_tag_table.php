<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->integer('food_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Foreign Keys
            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_tag');
    }
}
