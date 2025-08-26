<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Config; class MemberAdminList { private static $gridFields = array(); public static function registerGridField(\Closure $YHayk) { self::$gridFields[] = $YHayk; } public static function callGridField($cv5kq) { foreach (self::$gridFields as $YHayk) { call_user_func_array($YHayk, array($cv5kq)); } } }