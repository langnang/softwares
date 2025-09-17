<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Charge; class WapChargeData extends ChargeBaseData { protected function getBizContent() { goto QKcgg; QKcgg: $KqFED = array('body' => strval($this->body), 'subject' => strval($this->subject), 'out_trade_no' => strval($this->order_no), 'total_amount' => strval($this->amount), 'product_code' => 'QUICK_WAP_PAY', 'goods_type' => $this->goods_type, 'passback_params' => $this->return_param, 'disable_pay_channels' => $this->limitPay, 'store_id' => $this->store_id, 'quit_url' => $this->quit_url); goto phW4F; phW4F: $ShsHy = $this->timeout_express; goto IBAOb; IBAOb: if (!empty($ShsHy)) { $tyTz6 = floor(($ShsHy - strtotime($this->timestamp)) / 60); $tyTz6 > 0 && ($KqFED['timeout_express'] = $tyTz6 . 'm'); } goto XvCBB; XvCBB: return $KqFED; goto REO7W; REO7W: } }