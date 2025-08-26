<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMoneyLog extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_money_log')) { Schema::create('member_money_log', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->nullable()->comment('用户ID'); $G_sIl->decimal('change', 20, 2)->nullable()->comment('金额'); $G_sIl->string('remark', 100)->nullable()->comment('备注'); $G_sIl->index(array('memberUserId')); }); } } public function down() { } }