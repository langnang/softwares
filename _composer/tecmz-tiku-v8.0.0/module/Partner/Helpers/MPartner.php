<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ class MPartner { public static function all($OE9zh = 'home') { return \Module\Partner\Util\PartnerUtil::listByPositionWithCache($OE9zh); } }