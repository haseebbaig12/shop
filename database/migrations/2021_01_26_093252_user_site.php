<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_site', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user');
            $table->unsignedInteger('site');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('site')->references('id')->on('sites');
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
        //
    }
}
