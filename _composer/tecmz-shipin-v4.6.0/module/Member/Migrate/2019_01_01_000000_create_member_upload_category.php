<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberUploadCategory extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_upload_category')) { Schema::create('member_upload_category', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('userId')->nullable()->comment('用户ID'); $G_sIl->string('category', 10)->nullable()->comment('大类'); $G_sIl->integer('pid')->nullable()->comment('上级分类'); $G_sIl->integer('sort')->nullable()->comment('排序'); $G_sIl->string('title', 50)->nullable()->comment('名称'); $G_sIl->index(array('userId')); }); } } public function down() { } }