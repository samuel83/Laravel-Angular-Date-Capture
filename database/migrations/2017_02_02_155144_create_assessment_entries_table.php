<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_entries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('entry_id')->unsigned();

            $table->foreign('entry_id')
                ->references('id')->on('daily_entries')
                ->onDelete('cascade');

            $table->integer('assessment_id')->unsigned();

            $table->foreign('assessment_id')
                ->references('id')->on('assessments')
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
        Schema::drop('assessment_entries');
    }
}
