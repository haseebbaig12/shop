<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_basic', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug');
            $table->integer('status');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('site_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
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
        Schema::dropIfExists('product_basic');
    }
}
