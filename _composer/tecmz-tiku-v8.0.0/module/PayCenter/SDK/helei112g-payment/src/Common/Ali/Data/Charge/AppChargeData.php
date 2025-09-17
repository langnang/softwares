<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Ali\Data\Charge; class AppChargeData extends ChargeBaseData { protected function getBizContent() { goto bxaa4; exk_1: $ShsHy = $this->timeout_express; goto aEYdS; iKekL: return $KqFED; goto QD9_k; aEYdS: if (!empty($ShsHy)) { $tyTz6 = floor(($ShsHy - strtotime($this->timestamp)) / 60); $tyTz6 > 0 && ($KqFED['timeout_express'] = $tyTz6 . 'm'); } goto iKekL; bxaa4: $KqFED = array('body' => strval($this->body), 'subject' => strval($this->subject), 'out_trade_no' => strval($this->order_no), 'total_amount' => strval($this->amount), 'product_code' => 'QUICK_MSECURITY_PAY', 'goods_type' => $this->goods_type, 'passback_params' => $this->return_param, 'disable_pay_channels' => $this->limitPay, 'store_id' => $this->store_id); goto exk_1; QD9_k: } }