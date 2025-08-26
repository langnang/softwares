<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberMoneyChargeOrder extends Migration { public function up() { Schema::create('member_money_charge_order', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->nullable()->comment('排序'); $G_sIl->decimal('money', 20, 2)->nullable()->comment(''); $G_sIl->tinyInteger('status')->nullable()->comment('默认'); $G_sIl->index(array('memberUserId')); $G_sIl->index(array('created_at')); }); } public function down() { } }