<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionOption extends Migration { public function up() { Schema::create('question_option', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('questionId')->nullable()->comment('别名'); $PpLvp->tinyInteger('isAnswer')->nullable()->comment('是否是答案'); $PpLvp->string('option', 2000)->nullable()->comment('题目选项'); $PpLvp->index(array('questionId')); }); } public function down() { } }