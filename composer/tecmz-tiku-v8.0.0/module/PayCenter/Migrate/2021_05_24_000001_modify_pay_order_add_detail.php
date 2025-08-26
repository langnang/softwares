<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class ModifyPayOrderAddDetail extends Migration { public function up() { Schema::table('pay_order', function (Blueprint $PpLvp) { $PpLvp->string('body', 200)->nullable()->comment(''); $PpLvp->string('redirect', 200)->nullable()->comment(''); $PpLvp->bigInteger('id')->change(); }); } public function down() { } }