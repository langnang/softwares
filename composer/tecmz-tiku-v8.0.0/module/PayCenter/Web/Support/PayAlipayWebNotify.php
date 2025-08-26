<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Web\Support; use Illuminate\Support\Facades\Log; use Module\PayCenter\Type\PayType; use Module\PayCenter\Util\PayOrderUtil; use Payment\Notify\PayNotifyInterface; class PayAlipayWebNotify implements PayNotifyInterface { public function notifyProcess(array $GeXSC) { switch ($GeXSC['trade_status']) { case 'TRADE_SUCCESS': case 'TRADE_FINISHED': goto GPlmY; lxUrh: if ($BEdDh['code']) { return false; } goto RKrJP; RKrJP: return true; goto ZUbr_; GPlmY: Log::info('PayCenter.PayAlipayWebNotify.Success', array('out_trade_no' => $GeXSC['out_trade_no'], 'trade_no' => $GeXSC['trade_no'])); goto hVElv; hVElv: $BEdDh = PayOrderUtil::handleOrderPay(PayType::ALIPAY_WEB, $GeXSC['out_trade_no']); goto lxUrh; ZUbr_: } return true; } }