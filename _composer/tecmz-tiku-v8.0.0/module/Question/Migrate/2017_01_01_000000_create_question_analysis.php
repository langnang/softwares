<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionAnalysis extends Migration { public function up() { Schema::create('question_analysis', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('questionId')->nullable()->comment('题目ID'); $PpLvp->string('analysis', 2000)->nullable()->comment('题目解析'); $PpLvp->unique(array('questionId')); }); } public function down() { } }