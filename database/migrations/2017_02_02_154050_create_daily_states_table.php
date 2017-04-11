<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_states', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('state_id')->unsigned();

            $table->foreign('state_id')
                ->references('id')->on('states')
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
        Schema::drop('daily_states');
    }
}
