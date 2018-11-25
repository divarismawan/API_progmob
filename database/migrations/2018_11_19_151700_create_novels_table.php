<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_novel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('novel_title');
            $table->string('novel_genre');
            $table->text('novel_synopsis');
            $table->string('novel_story');
            $table->string('novel_cover');
            $table->enum('novel_status',['true','false']);
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
        Schema::dropIfExists('novels');
    }
}
