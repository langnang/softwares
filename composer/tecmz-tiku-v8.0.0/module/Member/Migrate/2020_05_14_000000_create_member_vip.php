<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberVip extends Migration { public function up() { Schema::table('member_user', function (Blueprint $PpLvp) { $PpLvp->integer('vipId')->nullable()->comment(''); $PpLvp->date('vipExpire')->nullable()->comment(''); }); Schema::create('member_vip_set', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('title', 50)->nullable()->comment('名称'); $PpLvp->string('flag', 50)->nullable()->comment('标识'); $PpLvp->integer('pid')->nullable()->comment('排序'); $PpLvp->integer('sort')->nullable()->comment('排序'); $PpLvp->tinyInteger('isDefault')->nullable()->comment('默认'); $PpLvp->string('icon', 100)->nullable()->comment('图标'); $PpLvp->decimal('price', 20, 2)->nullable()->comment(''); $PpLvp->integer('vipDays')->nullable()->comment(''); $PpLvp->text('content')->nullable()->comment('说明'); }); } public function down() { } }