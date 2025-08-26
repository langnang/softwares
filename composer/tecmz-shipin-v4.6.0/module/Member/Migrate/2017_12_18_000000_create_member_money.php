<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMoney extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_money')) { Schema::create('member_money', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->nullable()->comment('用户ID'); $G_sIl->decimal('total', 20, 2)->nullable()->comment('金额'); $G_sIl->unique(array('memberUserId')); }); } } public function down() { } }