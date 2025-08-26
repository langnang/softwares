<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateQuestion extends Migration { public function up() { Schema::create('question', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('alias', 16)->nullable()->comment('别名'); $PpLvp->string('question', 2000)->nullable()->comment('题干'); $PpLvp->integer('type')->nullable()->comment('类型'); $PpLvp->integer('parentId')->nullable()->comment('父题干ID'); $PpLvp->string('tag', 500)->nullable()->comment('题目标签,如 :1::2:'); $PpLvp->integer('clickCount')->nullable()->comment('点击量'); $PpLvp->integer('testCount')->nullable()->comment('测试量'); $PpLvp->integer('passCount')->nullable()->comment('通过量'); $PpLvp->integer('itemCount')->nullable()->comment('题目数量'); $PpLvp->integer('commentCount')->nullable()->comment('评论数'); $PpLvp->unique(array('alias')); }); } public function down() { } }