<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Query; use Payment\Common\Ali\Data\AliBaseData; use Payment\Common\PayException; class RefundQueryData extends AliBaseData { protected function getBizContent() { $KqFED = array('out_trade_no' => $this->out_trade_no, 'trade_no' => $this->trade_no, 'out_request_no' => $this->refund_no); return $KqFED; } protected function checkDataParam() { goto pWSHI; pWSHI: $f3szF = $this->trade_no; goto HHRB7; XNXml: if (empty($I7OQF) && empty($f3szF)) { throw new PayException('必须提供支付宝交易号或者商户网站唯一订单号。建议使用支付宝交易号'); } goto Y2BDW; Y2BDW: $vWFlB = $this->refund_no; goto t0gGG; HHRB7: $I7OQF = $this->out_trade_no; goto XNXml; t0gGG: if (empty($vWFlB)) { throw new PayException('支付宝查询退款，必须传入提款的请求号。如果在退款请求时未传入，则该值为创建交易时的外部交易号'); } goto b1oQb; b1oQb: } }