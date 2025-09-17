<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateArticle extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('article')) { Schema::create('article', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('position', 50)->nullable()->comment('位置'); $PpLvp->string('title', 200)->nullable()->comment('标题'); $PpLvp->text('content')->nullable()->comment('内容'); }); } } public function down() { } }