<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateArticle extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('article')) { Schema::create('article', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->string('position', 50)->nullable()->comment('位置'); $G_sIl->string('title', 200)->nullable()->comment('标题'); $G_sIl->text('content')->nullable()->comment('内容'); }); } } public function down() { } }