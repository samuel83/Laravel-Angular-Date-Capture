<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_topics', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('topic_id')->unsigned();

            $table->foreign('topic_id')
                ->references('id')->on('topics')
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
        Schema::drop('assessment_topics');
    }
}
