<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelManageUtil; class ModifyMemberVip20210112 extends Migration { public function up() { if (!ModelManageUtil::hasTableColumn('member_vip_set', 'quotaQuestionViewDaily')) { Schema::table('member_vip_set', function (Blueprint $PpLvp) { $PpLvp->string('quotaQuestionViewDaily', 100)->nullable()->comment(''); }); \Module\Member\Util\MemberVipUtil::clearCache(); } if (!ModelManageUtil::hasTable('member_vip_quota_question_view')) { Schema::create('member_vip_quota_question_view', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->integer('memberUserId')->nullable()->comment(''); $PpLvp->integer('questionId')->nullable()->comment('名称'); $PpLvp->date('day')->nullable()->comment(''); $PpLvp->unique(array('memberUserId', 'day', 'questionId'), 'daily_unique'); $PpLvp->index(array('memberUserId', 'questionId')); }); } } public function down() { } }