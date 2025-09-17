<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Biz; use Module\Vendor\Biz\BizTrait; class PartnerPositionBiz { use BizTrait; public static function all() { return self::listAll(); } public static function get($AfXAM) { return self::getByName($AfXAM); } }