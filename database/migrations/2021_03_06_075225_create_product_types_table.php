<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->integer('ide')->nullable();
            $table->integer('variation')->nullable();
            $table->integer('attribute')->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('product_types');
    }
}
