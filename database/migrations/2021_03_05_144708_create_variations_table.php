<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('attributeID');
            $table->string('code');
            $table->string('name');
            $table->unsignedInteger('status');
            $table->unsignedInteger('userID');
            $table->unsignedInteger('siteID');
            $table->foreign('attributeID')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('siteID')->references('id')->on('sites')->onDelete('cascade');
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
        Schema::dropIfExists('variations');
    }
}
