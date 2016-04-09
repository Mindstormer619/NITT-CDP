<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('scope', ['GLOBAL', 'TOPIC']);
            $table->integer('topic_id')->unsigned()->nullable();
            $table->integer('creator')->unsigned();
            $table->timestamps();

            $table->foreign('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('creator')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('circles');
    }
}
