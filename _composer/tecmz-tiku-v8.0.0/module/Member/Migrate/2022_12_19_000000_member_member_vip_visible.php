<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class MemberMemberVipVisible extends Migration { public function up() { Schema::table('member_vip_set', function (Blueprint $PpLvp) { $PpLvp->tinyInteger('visible')->nullable()->comment(''); }); \ModStart\Core\Dao\ModelUtil::updateAll('member_vip_set', array('visible' => true)); } public function down() { } }