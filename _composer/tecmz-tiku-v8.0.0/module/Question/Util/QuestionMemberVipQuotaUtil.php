<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Util; use ModStart\Core\Dao\ModelUtil; class QuestionMemberVipQuotaUtil { public static function questionViewCountToday($MqkYF) { return ModelUtil::count('member_vip_quota_question_view', array('memberUserId' => $MqkYF, 'day' => date('Y-m-d'))); } public static function questionViewPut($MqkYF, $WuEXg) { goto h6l6m; K2v0Q: ModelUtil::insert('member_vip_quota_question_view', $LJw3u); goto vQfpE; HJX2h: if (ModelUtil::exists('member_vip_quota_question_view', $LJw3u)) { return; } goto K2v0Q; h6l6m: $LJw3u = array('memberUserId' => $MqkYF, 'day' => date('Y-m-d'), 'questionId' => $WuEXg); goto HJX2h; vQfpE: } public static function questionViewed($MqkYF, $WuEXg) { $LJw3u = array('memberUserId' => $MqkYF, 'day' => date('Y-m-d'), 'questionId' => $WuEXg); return ModelUtil::exists('member_vip_quota_question_view', $LJw3u); } }