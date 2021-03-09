<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_texts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('postID');
            $table->string('title')->nullable();
            $table->string('post_text')->nullable();
            $table->unsignedInteger('languageID');
            $table->foreign('postID')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('post_texts');
    }
}
