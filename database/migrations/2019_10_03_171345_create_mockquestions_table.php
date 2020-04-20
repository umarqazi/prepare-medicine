<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMockquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mockquestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('search_id');
            $table->string('exam_id');
            $table->integer('user_id');
            $table->integer('ques_id');
            $table->longText('question');
            $table->integer('cat_id');
            $table->string('ans');
            $table->string('status')->nullable();
            $table->string('user_ans')->nullable();
            $table->longText('explanation')->nullable();
            $table->longText('hint')->nullable();
            $table->integer('type')->default('0');
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
        Schema::dropIfExists('mockquestions');
    }
}
