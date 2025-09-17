<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMoneyCash extends Migration { public function up() { Schema::create('member_money_cash', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment('用户ID'); $PpLvp->tinyInteger('status')->nullable()->comment('状态'); $PpLvp->decimal('money', 20, 2)->nullable()->comment('金额'); $PpLvp->decimal('moneyAfterTax', 20, 2)->nullable()->comment('实际到账'); $PpLvp->string('remark', 100)->nullable()->comment('备注'); $PpLvp->tinyInteger('type')->nullable()->comment('提现账号类型'); $PpLvp->string('realname', 50)->nullable()->comment('提现账号姓名'); $PpLvp->string('account', 200)->nullable()->comment('提现账号'); $PpLvp->index(array('memberUserId')); }); } public function down() { } }