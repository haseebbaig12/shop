<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_texts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('pagesID');
            $table->string('title')->nullable();
            $table->string('page_text')->nullable();
            $table->unsignedInteger('languageID');
            $table->foreign('pagesID')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
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
        Schema::dropIfExists('pages_texts');
    }
}
