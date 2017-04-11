<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('assessment_text');

            $table->string('date_added')->nullable();
            $table->string('date_updated')->nullable();

            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('editor_id')->unsigned();
            $table->foreign('editor_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('quarter_id')->unsigned();

            $table->foreign('quarter_id')
                ->references('id')->on('quarters')
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
        Schema::drop('assessments');
    }
}
