<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionAnswer extends Migration { public function up() { Schema::create('question_answer', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('questionId')->nullable()->comment('别名'); $PpLvp->string('answer', 2000)->nullable()->comment('题目答案'); $PpLvp->index(array('questionId')); }); } public function down() { } }