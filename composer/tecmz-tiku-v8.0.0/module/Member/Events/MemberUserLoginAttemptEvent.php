<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; use ModStart\Core\Util\EventUtil; class MemberUserLoginAttemptEvent { public $memberUserId; public $ip; public $ua; public static function fire($MqkYF, $Gc1UH, $owcs1) { goto Wj7ua; iH3xm: EventUtil::fire($yY11E); goto EuQcG; TZ3dI: $yY11E->memberUserId = $MqkYF; goto wAwCR; Wj7ua: $yY11E = new MemberUserLoginAttemptEvent(); goto TZ3dI; AORFr: $yY11E->ua = $owcs1; goto iH3xm; wAwCR: $yY11E->ip = $Gc1UH; goto AORFr; EuQcG: } }