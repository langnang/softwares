<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data; class BackPubChargeData extends WxBaseData { protected function buildData() { $this->retData = array('appId' => $this->appId, 'timeStamp' => time() . '', 'nonceStr' => $this->nonceStr, 'package' => 'prepay_id=' . $this->prepay_id, 'signType' => 'MD5'); } protected function checkDataParam() { } }