<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberUpload extends Migration { public function up() { if (!\ModStart\Core\Dao\ModelManageUtil::hasTable('member_upload')) { Schema::create('member_upload', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->unsignedInteger('userId')->nullable()->comment('用户ID'); $PpLvp->string('category', 10)->nullable()->comment('大类'); $PpLvp->unsignedInteger('dataId')->nullable()->comment('文件ID'); $PpLvp->integer('uploadCategoryId')->nullable()->comment('分类ID'); $PpLvp->index(array('userId', 'uploadCategoryId')); }); } } public function down() { } }