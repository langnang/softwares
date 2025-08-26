<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberMoneyChargeOrder extends Migration { public function up() { Schema::create('member_money_charge_order', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment('排序'); $PpLvp->decimal('money', 20, 2)->nullable()->comment(''); $PpLvp->tinyInteger('status')->nullable()->comment('默认'); $PpLvp->index(array('memberUserId')); $PpLvp->index(array('created_at')); }); } public function down() { } }