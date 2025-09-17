<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberAddress extends Migration { public function up() { Schema::create('member_address', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('userId')->nullable()->comment('用户ID'); $PpLvp->string('name', 20)->nullable()->comment('姓名'); $PpLvp->string('phone', 20)->nullable()->comment('手机号'); $PpLvp->string('area', 100)->nullable()->comment('省市地区'); $PpLvp->string('detail', 200)->nullable()->comment('详细地址'); $PpLvp->string('post', 20)->nullable()->comment('邮政编码'); $PpLvp->tinyInteger('isDefault')->nullable()->comment('默认'); $PpLvp->index(array('userId')); }); } public function down() { } }