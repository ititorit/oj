<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('name_without_accent')->unique();
            $table->text('intro');
            $table->text('full');
            $table->integer('idUser')->unsigned();
            // $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->integer('idCate')->unsigned();
            // $table->foreign('idCate')->references('id')->on('category')->onDelete('cascade');
            $table->integer('idChuDe')->insigned();
            // $table->foreign('idChuDe')->references('id')->on('chude')->onDelete('cascade');
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
