<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; class PartnerEnable extends Migration { public function up() { Schema::table('partner', function (Blueprint $PpLvp) { $PpLvp->tinyInteger('enable')->nullable()->comment(''); }); ModelUtil::updateAll('partner', array('enable' => true)); } public function down() { } }