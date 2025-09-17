<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberFavorite extends Migration { public function up() { Schema::create('member_favorite', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('userId')->comment('用户ID')->nullable(); $PpLvp->string('category', 20)->comment('类别')->nullable(); $PpLvp->integer('categoryId')->comment('所属类别ID')->nullable(); $PpLvp->index(array('userId', 'category')); }); } public function down() { } }