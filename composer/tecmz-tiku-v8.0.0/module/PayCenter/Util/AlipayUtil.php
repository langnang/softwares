<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Util; class AlipayUtil { public static function filterSpecialChars($VhHmv) { $Gqeki = array('+', '/', '=', '&'); return str_replace($Gqeki, ' ', $VhHmv); } }