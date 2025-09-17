<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Core; use Module\Member\Biz\Vip\AbstractMemberVipBiz; class QuestionMemberVipBiz extends AbstractMemberVipBiz { public function name() { return 'question'; } public function title() { return '题库'; } public function vipField($cv5kq) { $cv5kq->number('quotaQuestionViewDaily', '每日题目练习数')->required(); } }