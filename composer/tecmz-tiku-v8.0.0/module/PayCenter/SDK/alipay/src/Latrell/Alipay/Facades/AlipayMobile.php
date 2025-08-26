<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Latrell\Alipay\Facades; use Illuminate\Support\Facades\Facade; class AlipayMobile extends Facade { protected static function getFacadeAccessor() { return 'alipay.mobile'; } }