<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberMeta extends Migration { public function up() { Schema::create('member_meta', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->comment('')->nullable(); $PpLvp->string('name', 30)->comment('')->nullable(); $PpLvp->string('value', 1000)->comment('')->nullable(); $PpLvp->unique(array('memberUserId', 'name')); }); } public function down() { } }