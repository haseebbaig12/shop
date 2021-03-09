<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_texts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('attributeID');
            $table->unsignedInteger('language');
            $table->string('name');
            $table->foreign('attributeID')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('language')->references('id')->on('languages')->onDelete('cascade');
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
        Schema::dropIfExists('attribute_texts');
    }
}
