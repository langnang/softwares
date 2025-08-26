<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberAddress extends Migration { public function up() { Schema::create('member_address', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('userId')->nullable()->comment('用户ID'); $G_sIl->string('name', 20)->nullable()->comment('姓名'); $G_sIl->string('phone', 20)->nullable()->comment('手机号'); $G_sIl->string('area', 100)->nullable()->comment('省市地区'); $G_sIl->string('detail', 200)->nullable()->comment('详细地址'); $G_sIl->string('post', 20)->nullable()->comment('邮政编码'); $G_sIl->tinyInteger('isDefault')->nullable()->comment('默认'); $G_sIl->index(array('userId')); }); } public function down() { } }