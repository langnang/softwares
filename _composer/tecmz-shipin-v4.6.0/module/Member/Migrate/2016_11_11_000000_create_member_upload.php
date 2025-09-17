<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberUpload extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_upload')) { Schema::create('member_upload', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->unsignedInteger('userId')->nullable()->comment('用户ID'); $G_sIl->string('category', 10)->nullable()->comment('大类'); $G_sIl->unsignedInteger('dataId')->nullable()->comment('文件ID'); $G_sIl->integer('uploadCategoryId')->nullable()->comment('分类ID'); $G_sIl->index(array('userId', 'uploadCategoryId')); }); } } public function down() { } }