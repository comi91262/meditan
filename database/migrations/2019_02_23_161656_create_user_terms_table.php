<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user')->comment('回答者')->index()->reference('id')->on('users');
            $table->string('term_en', 50)->comment('英語');
            $table->string('term_jp', 30)->comment('日本語')->collation('utf8_general_ci');
            $table->integer('department')->comment('科')->reference('id')->on('departments');
            $table->index(['department', 'term_en']);
            $table->index(['department', 'term_jp']);
            $table->unique(['user', 'department', 'term_en']);
            $table->unique(['user', 'department', 'term_jp']);
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
        Schema::dropIfExists('user_terms');
    }
}
