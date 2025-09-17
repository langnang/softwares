<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Core; use ModStart\Core\Dao\ModelUtil; use Module\Member\Util\MemberMoneyUtil; use Module\PayCenter\Biz\AbstractPayCenterBiz; use Module\PayCenter\Type\PayType; use Module\Vendor\Type\OrderStatus; class MemberMoneyChargePayCenterBiz extends AbstractPayCenterBiz { const NAME = 'mMemberMoneyCharge'; public function name() { return self::NAME; } public function title() { return '用户钱包充值'; } public function disabledPayTypes() { return array(PayType::MEMBER_MONEY); } public function onPayed($ODAmA, $u4xbE, $EeGOj = array()) { goto FZ0uS; uTSCa: if ($zAOU6['status'] !== OrderStatus::WAIT_PAY) { return; } goto Luvjw; Luvjw: ModelUtil::update('member_money_charge_order', $ODAmA, array('status' => OrderStatus::COMPLETED)); goto JiY3b; JiY3b: MemberMoneyUtil::change($zAOU6['memberUserId'], $zAOU6['money'], '钱包充值'); goto pJ95o; FZ0uS: $zAOU6 = ModelUtil::get('member_money_charge_order', $ODAmA); goto uTSCa; pJ95o: } }