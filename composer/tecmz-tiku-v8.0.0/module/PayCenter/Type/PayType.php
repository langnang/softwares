<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Type; use ModStart\Core\Type\BaseType; use Module\PayCenter\Provider\PayCenterProvider; class PayType implements BaseType { const NONE = 'none'; const ALIPAY = 'alipay'; const ALIPAY_WEB = 'alipay_web'; const ALIPAY_MOBILE = 'alipay_mobile'; const WECHAT_MOBILE = 'wechat_mobile'; const WECHAT_MINI_PROGRAM = 'wechat_mini_program'; const WECHAT = 'wechat'; const WECHAT_APP = 'wechat_app'; const WECHAT_H5 = 'wechat_h5'; const MEMBER_MONEY = 'member_money'; public static function getList() { $TbleL = array(self::ALIPAY => '支付宝（旧）', self::ALIPAY_WEB => '支付宝', self::ALIPAY_MOBILE => '支付宝手机', self::WECHAT => '微信扫码', self::WECHAT_MOBILE => '微信手机', self::WECHAT_H5 => '微信H5', self::WECHAT_APP => '微信客户端', self::WECHAT_MINI_PROGRAM => '微信小程序', self::MEMBER_MONEY => '用户余额'); return array_merge($TbleL, PayCenterProvider::allMap()); } }