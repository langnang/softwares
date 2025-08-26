<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberVipOrder extends Migration { public function up() { Schema::create('member_vip_order', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->nullable()->comment('排序'); $G_sIl->integer('vipId')->nullable()->comment(''); $G_sIl->decimal('payFee', 20, 2)->nullable()->comment(''); $G_sIl->tinyInteger('status')->nullable()->comment('默认'); $G_sIl->date('expire')->nullable()->comment(''); $G_sIl->string('type', 20)->nullable()->comment(''); }); } public function down() { } }