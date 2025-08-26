<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Charge; class QrChargeData extends ChargeBaseData { protected function getBizContent() { goto BoaiB; PtmvI: return $KqFED; goto RA05P; LgowD: if (!empty($ShsHy)) { $tyTz6 = floor(($ShsHy - strtotime($this->timestamp)) / 60); $tyTz6 > 0 && ($KqFED['timeout_express'] = $tyTz6 . 'm'); } goto PtmvI; zqWc5: $ShsHy = $this->timeout_express; goto LgowD; BoaiB: $KqFED = array('out_trade_no' => strval($this->order_no), 'total_amount' => strval($this->amount), 'subject' => strval($this->subject), 'body' => strval($this->body), 'operator_id' => $this->operator_id, 'store_id' => $this->store_id, 'terminal_id' => $this->terminal_id); goto zqWc5; RA05P: } }