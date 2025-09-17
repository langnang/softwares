<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberMessage extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_message')) { Schema::create('member_message', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('userId')->comment('用户ID')->nullable(); $G_sIl->tinyInteger('status')->comment('1未读 2已读')->nullable(); $G_sIl->integer('fromId')->comment('来源用户ID')->nullable(); $G_sIl->string('content', 20000)->comment('消息内容(html)')->nullable(); $G_sIl->index(array('userId', 'status')); }); } } public function down() { } }