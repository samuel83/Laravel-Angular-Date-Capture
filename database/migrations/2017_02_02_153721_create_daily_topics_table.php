<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_topics', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('topic_id')->unsigned();

            $table->foreign('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade');

            $table->integer('entry_id')->unsigned();

            $table->foreign('entry_id')
                ->references('id')->on('daily_entries')
                ->onDelete('cascade');

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
        Schema::drop('daily_topics');
    }
}
