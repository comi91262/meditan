<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('term', 50);
            $table->integer('department')->comment('科')->reference('id')->on('departments');
            $table->index('department');
            $table->index('term');  // 似た単語を引くため
            $table->unique(['term', 'department']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_terms');
    }
}
