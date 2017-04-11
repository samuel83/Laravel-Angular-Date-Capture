<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_partners', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('partner_id')->unsigned();

            $table->foreign('partner_id')
                ->references('id')->on('partners')
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
        Schema::drop('daily_partners');
    }
}
