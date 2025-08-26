<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data; use Payment\Utils\StrUtil; class BackAppChargeData extends WxBaseData { protected function buildData() { $this->retData = array('appid' => $this->appId, 'partnerid' => $this->mchId, 'prepayid' => $this->prepay_id, 'package' => 'Sign=WXPay', 'noncestr' => StrUtil::getNonceStr(), 'timestamp' => time()); } protected function checkDataParam() { } }