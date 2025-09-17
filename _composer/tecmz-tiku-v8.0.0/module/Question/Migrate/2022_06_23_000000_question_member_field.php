<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; class QuestionMemberField extends Migration { public function up() { Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->integer('memberUserId')->nullable()->comment('用户ID')->default(0); $PpLvp->tinyInteger('status')->nullable()->comment('审核状态')->default(3); $PpLvp->index(array('memberUserId')); }); ModelUtil::updateAll('question', array('memberUserId' => 0)); } public function down() { } }