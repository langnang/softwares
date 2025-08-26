<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Events; class MemberUserPasswordResetedEvent { public $memberUserId; public $newPassword; public function __construct($MqkYF, $nym1e) { $this->memberUserId = $MqkYF; $this->newPassword = $nym1e; } }