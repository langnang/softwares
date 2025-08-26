<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNav extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('position', 50)->nullable()->comment('位置');

            $table->integer('sort')->nullable()->comment('顺序');
            $table->string('name', 100)->nullable()->comment('图片');
            $table->string('link', 200)->nullable()->comment('链接');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}