<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_texts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('short_description');
            $table->string('title');
            $table->unsignedInteger('categoryID');
            $table->unsignedInteger('language');
            $table->foreign('language')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('category_texts');
    }
}
