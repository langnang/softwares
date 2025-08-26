<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Cmb; use Payment\Common\Cmb\CmbBaseStrategy; use Payment\Common\Cmb\Data\Charge\ChargeData; class CmbCharge extends CmbBaseStrategy { public function getBuildDataClass() { goto c5i_k; NV3ki: return ChargeData::class; goto L29yv; WOGLl: if ($this->config->useSandbox) { $this->config->getewayUrl = 'http://121.15.180.66:801/NetPayment/BaseHttp.dll?MB_EUserPay'; } goto NV3ki; c5i_k: $this->config->getewayUrl = 'https://netpay.cmbchina.com/netpayment/BaseHttp.dll?MB_EUserPay'; goto WOGLl; L29yv: } }