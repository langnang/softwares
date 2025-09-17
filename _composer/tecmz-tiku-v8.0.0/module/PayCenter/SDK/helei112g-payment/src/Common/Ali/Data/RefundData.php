<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data; use Payment\Common\PayException; class RefundData extends AliBaseData { protected function checkDataParam() { goto PuTrH; bmJuJ: if (empty($I7OQF) && empty($f3szF)) { throw new PayException('必须提供支付宝交易号或者商户网站唯一订单号。建议使用支付宝交易号'); } goto B8MDW; B8MDW: if (empty($ZOlDw) || !is_numeric($ZOlDw)) { throw new PayException('refund_fee 退款的金额，该金额不能大于订单金额,单位为元，支持两位小数'); } goto oU1qT; DE9vF: $ZOlDw = $this->refund_fee; goto bmJuJ; JCyEm: $I7OQF = $this->out_trade_no; goto DE9vF; PuTrH: $f3szF = $this->trade_no; goto JCyEm; oU1qT: } protected function getBizContent() { $KqFED = array('out_trade_no' => $this->out_trade_no, 'trade_no' => $this->trade_no, 'refund_amount' => $this->refund_fee, 'refund_reason' => $this->reason, 'out_request_no' => $this->refund_no, 'operator_id' => $this->operator_id, 'store_id' => $this->store_id, 'terminal_id' => $this->terminal_id); return $KqFED; } }