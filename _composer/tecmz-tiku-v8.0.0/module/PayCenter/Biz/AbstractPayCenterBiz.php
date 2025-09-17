<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Biz; abstract class AbstractPayCenterBiz { public abstract function name(); public abstract function title(); public function disabledPayTypes() { return null; } public function onPayed($JoLvH, $XdWpe, $oG0tD = array()) { } public function onExpired($JoLvH, $XdWpe, $oG0tD = array()) { } }