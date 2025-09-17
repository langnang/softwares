<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Auth; use ModStart\Core\Util\ConvertUtil; use Module\Member\Util\MemberGroupUtil; use Module\Member\Util\MemberVipUtil; class MemberGroup { public static function get($F66vY = null) { goto uLHvB; EUPi0: if (null === $b3n0k) { $b3n0k = MemberGroupUtil::getMemberGroup(MemberUser::user()); } goto tCHY3; E89H_: return $b3n0k; goto Q8cTE; tCHY3: if (null !== $F66vY) { return $b3n0k[$F66vY]; } goto E89H_; uLHvB: static $b3n0k = null; goto EUPi0; Q8cTE: } public static function inGroupIds($lWLtj) { goto mrhFH; mrhFH: if (!is_array($lWLtj)) { $lWLtj = ConvertUtil::toArray($lWLtj); } goto B3JjG; c2iha: if (empty($wQ1uv)) { return false; } goto BSUEi; B3JjG: $wQ1uv = self::get('id'); goto c2iha; BSUEi: return in_array($wQ1uv, $lWLtj); goto UOKaS; UOKaS: } }