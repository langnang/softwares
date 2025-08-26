<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; use ModStart\Core\Util\EventUtil; class MemberUserLoginFailedEvent { public $memberUserId; public $username; public $ip; public $ua; public static function fire($XK7hT, $eZXtQ, $SMv3l, $nrHyB) { goto Od0Tb; kCpBL: $bjOuZ->ua = $nrHyB; goto O32MS; uKCZu: $bjOuZ->ip = $SMv3l; goto kCpBL; qub31: $bjOuZ->username = $eZXtQ; goto uKCZu; Od0Tb: $bjOuZ = new MemberUserLoginFailedEvent(); goto OV9HS; OV9HS: $bjOuZ->memberUserId = $XK7hT; goto qub31; O32MS: EventUtil::fire($bjOuZ); goto s8a55; s8a55: } }