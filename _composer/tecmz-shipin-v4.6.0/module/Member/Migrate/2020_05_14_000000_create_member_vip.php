<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberVip extends Migration { public function up() { Schema::table('member_user', function (Blueprint $G_sIl) { $G_sIl->integer('vipId')->nullable()->comment(''); $G_sIl->date('vipExpire')->nullable()->comment(''); }); Schema::create('member_vip_set', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->string('title', 50)->nullable()->comment('名称'); $G_sIl->string('flag', 50)->nullable()->comment('标识'); $G_sIl->integer('pid')->nullable()->comment('排序'); $G_sIl->integer('sort')->nullable()->comment('排序'); $G_sIl->tinyInteger('isDefault')->nullable()->comment('默认'); $G_sIl->string('icon', 100)->nullable()->comment('图标'); $G_sIl->decimal('price', 20, 2)->nullable()->comment(''); $G_sIl->integer('vipDays')->nullable()->comment(''); $G_sIl->text('content')->nullable()->comment('说明'); }); } public function down() { } }