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
            $table->string('department', 10)->collation('utf8_general_ci')->comment('科');
            $table->index('department');
            $table->index('term');  // 似た単語を引くため
            $table->unique('term');
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
