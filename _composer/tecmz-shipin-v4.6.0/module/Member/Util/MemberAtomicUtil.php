<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use ModStart\Core\Exception\BizException; use Module\Member\Auth\MemberUser; use Module\Vendor\Atomic\AtomicUtil; class MemberAtomicUtil { public static function acquireOrFail($J1J_v, $O5e4c, $XK7hT = null, $vh7jz = 30) { if (!self::acquire($O5e4c, $XK7hT, $vh7jz)) { BizException::throws($J1J_v); } } public static function acquire($O5e4c, $XK7hT = null, $vh7jz = 30) { goto VJsgk; VJsgk: if (null === $XK7hT) { $XK7hT = MemberUser::id(); } goto Gtqrg; Y4Ah_: return AtomicUtil::acquire($F66vY, $vh7jz); goto VYSYw; Gtqrg: $F66vY = $O5e4c . '_' . $XK7hT; goto Y4Ah_; VYSYw: } public static function release($O5e4c, $XK7hT = null) { goto BCKlX; xMl1y: AtomicUtil::release($F66vY); goto zYYdz; BCKlX: if (null === $XK7hT) { $XK7hT = MemberUser::id(); } goto MVvCX; MVvCX: $F66vY = $O5e4c . '_' . $XK7hT; goto xMl1y; zYYdz: } }