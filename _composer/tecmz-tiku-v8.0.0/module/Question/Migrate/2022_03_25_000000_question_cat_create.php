<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class QuestionCatCreate extends Migration { public function up() { Schema::create('question_cat', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('sort')->nullable()->comment(''); $PpLvp->string('title', 100)->nullable()->comment(''); $PpLvp->tinyInteger('catShow')->nullable()->comment(''); $PpLvp->integer('questionCount')->nullable()->comment(''); $PpLvp->string('bgCover', 200)->nullable()->comment(''); }); } public function down() { } }