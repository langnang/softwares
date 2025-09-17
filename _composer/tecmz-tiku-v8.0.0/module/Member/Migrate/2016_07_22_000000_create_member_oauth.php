<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberOauth extends Migration { public function up() { Schema::create('member_oauth', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->comment('用户ID')->nullable(); $PpLvp->string('type', 30)->comment('类型')->nullable(); $PpLvp->string('openId', 150)->comment('OpenId')->nullable(); $PpLvp->index(array('type', 'openId')); $PpLvp->index(array('memberUserId')); }); } public function down() { } }