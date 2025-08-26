<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Auth; use Module\Member\Util\MemberVipUtil; class MemberVip { public static function get($Mlv3V = null, $z5iar = null) { goto MCsqH; MCsqH: static $jFABH = null; goto aZ7jW; RB3rQ: if (null !== $Mlv3V) { return isset($jFABH[$Mlv3V]) ? $jFABH[$Mlv3V] : $z5iar; } goto zKsn3; aZ7jW: if (null === $jFABH) { $jFABH = MemberVipUtil::getMemberVip(MemberUser::user()); } goto RB3rQ; zKsn3: return $jFABH; goto H7qv0; H7qv0: } public static function isDefault() { return self::get('isDefault', false); } public static function id() { return self::get('id', 0); } }