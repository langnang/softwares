<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateVideo extends Migration { public function up() { Schema::create('video', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('categoryId')->comment('分类ID')->nullable(); $G_sIl->tinyInteger('isRecommend')->comment('')->nullable(); $G_sIl->tinyInteger('isShowHome')->comment('')->nullable(); $G_sIl->integer('countPlayed')->comment('')->nullable(); $G_sIl->integer('countUp')->comment('')->nullable(); $G_sIl->string('title', 200)->nullable()->comment('标题'); $G_sIl->string('cover', 200)->nullable()->comment(''); $G_sIl->string('url', 400)->nullable()->comment('摘要'); $G_sIl->string('summary', 400)->nullable()->comment('介绍'); }); } public function down() { } }