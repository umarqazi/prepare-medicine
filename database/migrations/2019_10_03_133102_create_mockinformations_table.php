<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMockinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mockinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('exam_id');
            $table->string('time');
            $table->string('wrong_ans');
            $table->string('right_ans');
            $table->string('status')->default(1);
            $table->string('type')->default(1);
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->integer('recall_id')->nullable();
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
        Schema::dropIfExists('mockinformations');
    }
}
