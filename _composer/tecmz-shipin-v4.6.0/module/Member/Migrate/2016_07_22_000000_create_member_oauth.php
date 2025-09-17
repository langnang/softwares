<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberOauth extends Migration { public function up() { Schema::create('member_oauth', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->comment('用户ID')->nullable(); $G_sIl->string('type', 30)->comment('类型')->nullable(); $G_sIl->string('openId', 150)->comment('OpenId')->nullable(); $G_sIl->index(array('type', 'openId')); $G_sIl->index(array('memberUserId')); }); } public function down() { } }