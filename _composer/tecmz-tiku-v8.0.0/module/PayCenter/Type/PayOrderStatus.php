<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Type; use ModStart\Core\Type\BaseType; class PayOrderStatus implements BaseType { const NEW_ORDER = 1; const CREATED = 2; const PAYED = 3; const REFUND = 4; const REFUNDING = 5; const REFUND_SUCCESS = 6; const CLOSED = 7; const CLOSED_EXPIRED = 8; public static function getList() { return array(self::NEW_ORDER => '新订单(支付系统未创建)', self::CREATED => '新订单(未付款)', self::PAYED => '付款成功', self::REFUND => '申请退款', self::REFUNDING => '退款中', self::REFUND_SUCCESS => '已退款', self::CLOSED => '已关闭(未支付)', self::CLOSED_EXPIRED => '已关闭(过期)'); } }