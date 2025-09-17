<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestionTag extends Migration { public function up() { Schema::create('question_tag', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('groupId')->nullable()->comment('标签组ID'); $PpLvp->string('title', 100)->nullable()->comment('名称'); $PpLvp->string('cover', 200)->nullable()->comment('图片'); $PpLvp->string('description', 2000)->nullable()->comment('介绍'); $PpLvp->index(array('groupId')); }); } public function down() { } }