<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclePostMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circles_posts_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('circle_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();

            $table->foreign('circle_id')
                ->references('id')->on('circles')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['circle_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('circles_posts_map');
    }
}
