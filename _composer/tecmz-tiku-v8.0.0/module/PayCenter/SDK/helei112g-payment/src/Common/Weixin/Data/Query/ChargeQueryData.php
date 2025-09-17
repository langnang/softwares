<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data\Query; use Payment\Common\PayException; use Payment\Common\Weixin\Data\WxBaseData; use Payment\Utils\ArrayUtil; class ChargeQueryData extends WxBaseData { protected function buildData() { $this->retData = array('appid' => $this->appId, 'mch_id' => $this->mchId, 'nonce_str' => $this->nonceStr, 'sign_type' => $this->signType, 'transaction_id' => $this->transaction_id, 'out_trade_no' => $this->out_trade_no, 'sub_appid' => $this->sub_appid, 'sub_mch_id' => $this->sub_mch_id); $this->retData = ArrayUtil::paraFilter($this->retData); } protected function checkDataParam() { goto qaJAO; hkh56: $rQxBE = $this->out_trade_no; goto Z3Ai7; Z3Ai7: if (empty($L1GEo) && empty($rQxBE)) { throw new PayException('必须提供微信交易号或商户网站唯一订单号。建议使用微信交易号'); } goto Y1MG2; qaJAO: $L1GEo = $this->transaction_id; goto hkh56; Y1MG2: } }