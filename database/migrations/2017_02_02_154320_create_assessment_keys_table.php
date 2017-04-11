<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_keys', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('key_field_id')->unsigned();

            $table->foreign('key_field_id')
                ->references('id')->on('key_fields')
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
        Schema::drop('assessment_keys');
    }
}
