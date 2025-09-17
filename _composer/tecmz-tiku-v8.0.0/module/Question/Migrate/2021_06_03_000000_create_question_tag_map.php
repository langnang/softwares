<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionTagMap extends Migration { public function up() { Schema::create('question_tag_map', function (Blueprint $PpLvp) { $PpLvp->bigIncrements('id'); $PpLvp->timestamps(); $PpLvp->integer('questionId')->nullable()->comment(''); $PpLvp->integer('tagId')->nullable()->comment(''); $PpLvp->index(array('tagId')); $PpLvp->index(array('questionId')); }); } public function down() { } }