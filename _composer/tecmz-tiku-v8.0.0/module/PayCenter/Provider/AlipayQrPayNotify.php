<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Provider; use Illuminate\Support\Facades\Log; use Module\PayCenter\Util\PayOrderUtil; use Payment\Notify\PayNotifyInterface; class AlipayQrPayNotify implements PayNotifyInterface { public function notifyProcess(array $GeXSC) { switch ($GeXSC['trade_status']) { case 'TRADE_SUCCESS': case 'TRADE_FINISHED': goto qIShK; LgtQr: if ($BEdDh['code']) { return false; } goto ZMMPb; rVF41: $BEdDh = PayOrderUtil::handleOrderPay(AlipayQrPayCenterProvider::NAME, $GeXSC['out_trade_no']); goto LgtQr; qIShK: Log::info('AlipayQrNotifyVerifySuccess', array('out_trade_no' => $GeXSC['out_trade_no'], 'trade_no' => $GeXSC['trade_no'])); goto rVF41; ZMMPb: return true; goto wokMP; wokMP: } return true; } }