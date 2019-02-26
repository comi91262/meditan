<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJapaneseTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('japanese_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('term', 30)->collation('utf8_general_ci')->comment('日本名');
            $table->string('department', 10)->collation('utf8_general_ci')->comment('科');
            $table->index('department');
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
        Schema::dropIfExists('japanese_terms');
    }
}
