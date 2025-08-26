<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Auth; use Module\Member\Util\MemberVipUtil; class MemberVip { public static function get($F66vY = null, $Ij1Yd = null) { goto T8VQY; T8VQY: static $o1JLD = null; goto whC_q; bV8zw: if (null !== $F66vY) { return isset($o1JLD[$F66vY]) ? $o1JLD[$F66vY] : $Ij1Yd; } goto tgU4m; whC_q: if (null === $o1JLD) { $o1JLD = MemberVipUtil::getMemberVip(MemberUser::user()); } goto bV8zw; tgU4m: return $o1JLD; goto eSSEV; eSSEV: } public static function isDefault() { return self::get('isDefault', false); } public static function id() { return self::get('id', 0); } }