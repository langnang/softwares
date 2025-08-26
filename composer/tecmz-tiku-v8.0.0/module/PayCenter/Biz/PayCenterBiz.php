<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Biz; use Module\Vendor\Biz\BizTrait; class PayCenterBiz { use BizTrait; public static function registerQuick($AfXAM, $jTNJC) { goto K4WBl; K4WBl: $PeuNd = new QuickPayCenterBiz(); goto Xh5SR; EiSzv: $PeuNd->title = $jTNJC; goto yxjqB; Xh5SR: $PeuNd->name = $AfXAM; goto EiSzv; yxjqB: self::register($PeuNd); goto k3o3H; k3o3H: } public static function all() { return self::listAll(); } public static function get($AfXAM) { return self::getByName($AfXAM); } }