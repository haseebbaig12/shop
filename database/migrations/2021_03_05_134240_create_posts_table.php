<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('url');
            $table->string('code')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->integer('status');
            $table->string('image')->nullable();
            $table->unsignedInteger('userID');
            $table->unsignedInteger('siteID');
            $table->unsignedInteger('catID');
            $table->foreign('catID')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
