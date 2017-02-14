<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theme_id');
            $table->unsignedInteger('author_id');
            $table->string('en');
            $table->mediumText('en_description');
            $table->string('ru');
            $table->mediumText('ru_description');
            $table->timestamps();

            $table->foreign('theme_id')
                ->references('id')->on('theme')
                ->onDelete('cascade');

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('word');
    }
}
