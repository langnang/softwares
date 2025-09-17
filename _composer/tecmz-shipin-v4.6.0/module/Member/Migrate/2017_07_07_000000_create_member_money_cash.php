<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMoneyCash extends Migration { public function up() { Schema::create('member_money_cash', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->nullable()->comment('用户ID'); $G_sIl->tinyInteger('status')->nullable()->comment('状态'); $G_sIl->decimal('money', 20, 2)->nullable()->comment('金额'); $G_sIl->decimal('moneyAfterTax', 20, 2)->nullable()->comment('实际到账'); $G_sIl->string('remark', 100)->nullable()->comment('备注'); $G_sIl->tinyInteger('type')->nullable()->comment('提现账号类型'); $G_sIl->string('realname', 50)->nullable()->comment('提现账号姓名'); $G_sIl->string('account', 200)->nullable()->comment('提现账号'); $G_sIl->index(array('memberUserId')); }); } public function down() { } }