<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('section');
            $table->uuid('user')->comment('回答者')->index()->reference('id')->on('users');
            $table->integer('number')->comment('問題番号');
            $table->string('question', 100)->comment('問題');
            $table->string('answer', 100)->comment('答え');
            $table->string('user_answer', 100)->nullable()->comment('回答');
            $table->boolean('success')->default(false)->comment('正解したかどうか');
            $table->dateTime('success_datetime')->nullable()->comment('正解した時の日時');
            $table->timestamps();
            $table->primary(['section', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
