<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; use Module\Member\Type\MemberMessageStatus; use Module\Member\Util\MemberUtil; class ModifyMemberUserMessageCount extends Migration { public function up() { goto MaOBG; MaOBG: Schema::table('member_user', function (Blueprint $PpLvp) { $PpLvp->integer('messageCount')->nullable()->comment('未读消息数量'); }); goto LJZd8; LJZd8: $v39Ud = ModelUtil::model('member_message')->where(array('status' => MemberMessageStatus::UNREAD))->groupBy('userId')->get(array('userId', \DB::raw('count(*) as count')))->toArray(); goto lU12w; lU12w: foreach ($v39Ud as $NZ_6d) { MemberUtil::update($NZ_6d['userId'], array('messageCount' => $NZ_6d['count'])); } goto X2FGb; X2FGb: } public function down() { } }