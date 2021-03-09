<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_texts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->string('name')->nullable();
            $table->string('long_description')->nullable();
            $table->string('short_description')->nullable();
            $table->unsignedInteger('language');
            $table->foreign('product_id')->references('id')->on('product_basic')->onDelete('cascade');
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
        Schema::dropIfExists('product_texts');
    }
}
