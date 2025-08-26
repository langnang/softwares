<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMoney extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_money')) { Schema::create('member_money', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment('用户ID'); $PpLvp->decimal('total', 20, 2)->nullable()->comment('金额'); $PpLvp->unique(array('memberUserId')); }); } } public function down() { } }