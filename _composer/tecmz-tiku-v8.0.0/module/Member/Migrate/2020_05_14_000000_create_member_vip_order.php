<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberVipOrder extends Migration { public function up() { Schema::create('member_vip_order', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment('排序'); $PpLvp->integer('vipId')->nullable()->comment(''); $PpLvp->decimal('payFee', 20, 2)->nullable()->comment(''); $PpLvp->tinyInteger('status')->nullable()->comment('默认'); $PpLvp->date('expire')->nullable()->comment(''); $PpLvp->string('type', 20)->nullable()->comment(''); }); } public function down() { } }