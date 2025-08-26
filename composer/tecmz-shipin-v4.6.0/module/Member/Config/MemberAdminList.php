<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Config; class MemberAdminList { private static $gridFields = array(); public static function registerGridField(\Closure $LcMnE) { self::$gridFields[] = $LcMnE; } public static function callGridField($Jf1S7) { foreach (self::$gridFields as $LcMnE) { call_user_func_array($LcMnE, array($Jf1S7)); } } }