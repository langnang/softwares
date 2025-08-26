<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionTagGroup extends Migration { public function up() { Schema::create('question_tag_group', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('title', 100)->nullable()->comment('名称'); $PpLvp->integer('pid')->nullable()->comment('上级分类'); $PpLvp->integer('sort')->nullable()->comment('排序'); $PpLvp->index(array('pid')); }); } public function down() { } }