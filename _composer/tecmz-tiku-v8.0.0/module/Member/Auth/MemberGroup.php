<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Auth; use ModStart\Core\Util\ConvertUtil; use Module\Member\Util\MemberGroupUtil; use Module\Member\Util\MemberVipUtil; class MemberGroup { public static function get($Mlv3V = null) { goto rcJgm; uIkqI: if (null === $rbJ93) { $rbJ93 = MemberGroupUtil::getMemberGroup(MemberUser::user()); } goto NDlDW; NDlDW: if (null !== $Mlv3V) { return $rbJ93[$Mlv3V]; } goto PZ0RO; rcJgm: static $rbJ93 = null; goto uIkqI; PZ0RO: return $rbJ93; goto nYSrr; nYSrr: } public static function inGroupIds($mJrzn) { goto cF06d; LOcdD: return in_array($wa91I, $mJrzn); goto sGExs; LdHRj: if (empty($wa91I)) { return false; } goto LOcdD; bDeQ8: $wa91I = self::get('id'); goto LdHRj; cF06d: if (!is_array($mJrzn)) { $mJrzn = ConvertUtil::toArray($mJrzn); } goto bDeQ8; sGExs: } }