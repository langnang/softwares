<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data\Query; use Payment\Common\PayException; use Payment\Common\Weixin\Data\WxBaseData; use Payment\Utils\ArrayUtil; class TransferQueryData extends WxBaseData { protected function buildData() { $this->retData = array('appid' => $this->appId, 'mch_id' => $this->mchId, 'nonce_str' => $this->nonceStr, 'partner_trade_no' => $this->trans_no); $this->retData = ArrayUtil::paraFilter($this->retData); } protected function checkDataParam() { $jDVRk = $this->trans_no; if (empty($jDVRk)) { throw new PayException('请提供商户调用企业付款API时使用的商户订单号'); } } }