<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Query; use Payment\Common\Ali\Data\AliBaseData; use Payment\Common\PayException; use Payment\Utils\ArrayUtil; class ChargeQueryData extends AliBaseData { protected function getBizContent() { $KqFED = array('out_trade_no' => $this->out_trade_no, 'trade_no' => $this->trade_no); return $KqFED; } protected function checkDataParam() { goto rGJca; UyXCe: if (empty($I7OQF) && empty($f3szF)) { throw new PayException('必须提供支付宝交易号或者商户网站唯一订单号。建议使用支付宝交易号'); } goto uoXg4; Wp277: $I7OQF = $this->out_trade_no; goto UyXCe; rGJca: $f3szF = $this->trade_no; goto Wp277; uoXg4: } }