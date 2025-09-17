<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; use ModStart\Core\Util\EventUtil; class MemberUserLoginFailedEvent { public $memberUserId; public $username; public $ip; public $ua; public static function fire($MqkYF, $eM5tA, $Gc1UH, $owcs1) { goto L6oLv; vrNLh: $yY11E->ip = $Gc1UH; goto WzLyg; pCOMd: $yY11E->username = $eM5tA; goto vrNLh; WzLyg: $yY11E->ua = $owcs1; goto NyhQd; NyhQd: EventUtil::fire($yY11E); goto vHhHo; L6oLv: $yY11E = new MemberUserLoginFailedEvent(); goto qaWCx; qaWCx: $yY11E->memberUserId = $MqkYF; goto pCOMd; vHhHo: } }