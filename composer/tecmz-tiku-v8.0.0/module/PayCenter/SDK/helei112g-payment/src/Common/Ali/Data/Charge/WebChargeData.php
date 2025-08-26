<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Charge; class WebChargeData extends ChargeBaseData { protected function getBizContent() { goto frfUs; AoOrE: return $KqFED; goto E5MZU; frfUs: $KqFED = array('out_trade_no' => strval($this->order_no), 'product_code' => 'FAST_INSTANT_TRADE_PAY', 'total_amount' => strval($this->amount), 'subject' => strval($this->subject), 'body' => strval($this->body), 'passback_params' => $this->return_param, 'goods_type' => $this->goods_type, 'disable_pay_channels' => $this->limitPay, 'store_id' => $this->store_id, 'qr_pay_mode' => $this->qr_mod); goto bl3EY; b7NyZ: if (!empty($ShsHy)) { $tyTz6 = floor(($ShsHy - strtotime($this->timestamp)) / 60); $tyTz6 > 0 && ($KqFED['timeout_express'] = $tyTz6 . 'm'); } goto AoOrE; bl3EY: $ShsHy = $this->timeout_express; goto b7NyZ; E5MZU: } }