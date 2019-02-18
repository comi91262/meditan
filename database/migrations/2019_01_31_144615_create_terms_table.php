<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_jp', 30)->collation('utf8_general_ci')->comment('日本名');
            $table->string('name_en', 50);
            $table->string('department', 10);
            $table->timestamps();
            $table->index('department');
            $table->index('name_jp');
            $table->index('name_en');
            $table->unique(['name_jp', 'name_en']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
