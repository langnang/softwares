<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class ModifyVideoAddSort extends Migration { public function up() { Schema::table('video', function (Blueprint $G_sIl) { $G_sIl->integer('sort')->comment('')->nullable(); }); } public function down() { } }