<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class ModifyQuestion20180112 extends Migration { public function up() { Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->string('source', 100)->nullable()->comment('试题来源'); }); } public function down() { } }