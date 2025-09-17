<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; use ModStart\Core\Util\EventUtil; class MemberUserLoginAttemptEvent { public $memberUserId; public $ip; public $ua; public static function fire($XK7hT, $SMv3l, $nrHyB) { goto KYzjK; SDFty: $bjOuZ->ua = $nrHyB; goto c9WYV; KYzjK: $bjOuZ = new MemberUserLoginAttemptEvent(); goto sRyXh; sRyXh: $bjOuZ->memberUserId = $XK7hT; goto vJ00R; c9WYV: EventUtil::fire($bjOuZ); goto E6aAY; vJ00R: $bjOuZ->ip = $SMv3l; goto SDFty; E6aAY: } }