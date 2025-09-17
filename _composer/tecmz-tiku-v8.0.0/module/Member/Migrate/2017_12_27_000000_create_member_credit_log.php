<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberCreditLog extends Migration { public function up() { Schema::create('member_credit_log', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment('用户ID'); $PpLvp->integer('change')->nullable()->comment('金额'); $PpLvp->string('remark', 100)->nullable()->comment('备注'); $PpLvp->index(array('memberUserId')); }); } public function down() { } }