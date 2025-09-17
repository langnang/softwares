<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberMeta extends Migration { public function up() { Schema::create('member_meta', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('memberUserId')->comment('')->nullable(); $G_sIl->string('name', 30)->comment('')->nullable(); $G_sIl->string('value', 1000)->comment('')->nullable(); $G_sIl->unique(array('memberUserId', 'name')); }); } public function down() { } }