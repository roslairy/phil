<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class ArticleAndTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->string('taxonomy');
            $table->text('body');
            $table->string('picture');
            $table->boolean('erasable');
            $table->integer('pv');
            $table->timestamps();
        });
        Schema::create('teachers', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('picture');
		    $table->string('synopsis');
		    $table->string('taxonomy');
		    $table->integer('famous');
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
        Schema::drop('articles');
        Schema::drop('teachers');
    }
}
