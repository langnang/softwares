<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Query; use Payment\Common\Ali\Data\AliBaseData; use Payment\Common\PayException; class TransferQueryData extends AliBaseData { protected function getBizContent() { $KqFED = array('out_biz_no' => $this->trans_no, 'order_id' => $this->transaction_id); return $KqFED; } protected function checkDataParam() { goto Eeujj; AeB5_: $mWdQm = $this->transaction_id; goto BEy7O; BEy7O: if (empty($mWdQm) && empty($jDVRk)) { throw new PayException('必须提供支付宝转账单据号或者商户转账单号'); } goto Y38nZ; Eeujj: $jDVRk = $this->trans_no; goto AeB5_; Y38nZ: } }