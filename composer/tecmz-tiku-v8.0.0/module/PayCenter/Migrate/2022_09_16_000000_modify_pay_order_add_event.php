<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; class ModifyPayOrderAddEvent extends Migration { public function up() { Schema::table('pay_order', function (Blueprint $PpLvp) { $PpLvp->tinyInteger('eventNotified')->nullable()->comment(''); }); ModelUtil::updateAll('pay_order', array('eventNotified' => true)); } public function down() { } }