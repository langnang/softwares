<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class ModifyArticleAddAlias extends Migration { public function up() { Schema::table('article', function (Blueprint $PpLvp) { $PpLvp->string('alias', 50)->nullable()->comment(''); $PpLvp->index('alias'); }); } public function down() { } }