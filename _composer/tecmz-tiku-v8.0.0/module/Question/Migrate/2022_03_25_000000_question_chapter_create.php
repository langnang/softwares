<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class QuestionChapterCreate extends Migration { public function up() { Schema::create('question_chapter', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('catId')->nullable()->comment(''); $PpLvp->integer('pid')->nullable()->comment(''); $PpLvp->integer('sort')->nullable()->comment(''); $PpLvp->string('title', 100)->nullable()->comment(''); $PpLvp->integer('questionCount')->nullable()->comment(''); }); } public function down() { } }