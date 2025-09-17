<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Core; use ModStart\Core\Dao\ModelUtil; use Module\Member\Util\MemberMoneyUtil; use Module\PayCenter\Biz\AbstractPayCenterBiz; use Module\PayCenter\Type\PayType; use Module\Vendor\Type\OrderStatus; class MemberMoneyChargePayCenterBiz extends AbstractPayCenterBiz { const NAME = 'mMemberMoneyCharge'; public function name() { return self::NAME; } public function title() { return '用户钱包充值'; } public function disabledPayTypes() { return array(PayType::MEMBER_MONEY); } public function onPayed($JoLvH, $XdWpe, $oG0tD = array()) { goto museJ; Ce4Si: ModelUtil::update('member_money_charge_order', $JoLvH, array('status' => OrderStatus::COMPLETED)); goto QNWjz; QNWjz: MemberMoneyUtil::change($IfVKl['memberUserId'], $IfVKl['money'], '钱包充值'); goto qcGTU; museJ: $IfVKl = ModelUtil::get('member_money_charge_order', $JoLvH); goto DoeoD; DoeoD: if ($IfVKl['status'] !== OrderStatus::WAIT_PAY) { return; } goto Ce4Si; qcGTU: } }