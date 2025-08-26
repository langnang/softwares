<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; class MemberUserPasswordResetedEvent { public $memberUserId; public $newPassword; public function __construct($XK7hT, $ATOYa) { $this->memberUserId = $XK7hT; $this->newPassword = $ATOYa; } }