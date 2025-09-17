<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class ModifyQuestion20210112 extends Migration { public function up() { Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->index('parentId'); }); } public function down() { } }