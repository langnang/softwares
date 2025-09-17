<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; class QuestionAdminField extends Migration { public function up() { Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->integer('adminUserId')->nullable()->comment('管理员ID')->default(0); $PpLvp->index(array('adminUserId')); }); ModelUtil::updateAll('question', array('adminUserId' => 0)); } public function down() { } }