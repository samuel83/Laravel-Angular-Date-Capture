<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_keys', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('key_field_id')->unsigned();

            $table->foreign('key_field_id')
                ->references('id')->on('key_fields')
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
        Schema::drop('daily_keys');
    }
}
