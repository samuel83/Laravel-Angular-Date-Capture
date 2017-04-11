<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_states', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('state_id')->unsigned();

            $table->foreign('state_id')
                ->references('id')->on('states')
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
        Schema::drop('assessment_states');
    }
}
