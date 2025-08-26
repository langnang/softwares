<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberFavorite extends Migration { public function up() { Schema::create('member_favorite', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('userId')->comment('用户ID')->nullable(); $G_sIl->string('category', 20)->comment('类别')->nullable(); $G_sIl->integer('categoryId')->comment('所属类别ID')->nullable(); $G_sIl->index(array('userId', 'category')); }); } public function down() { } }