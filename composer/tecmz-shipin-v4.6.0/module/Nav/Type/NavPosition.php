<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; use ModStart\Core\Type\BaseType; use ModStart\Module\ModuleManager; use Module\Nav\Biz\NavPositionBiz; class NavPosition implements BaseType { public static function getList() { return array_merge(ModuleManager::getModuleConfigKeyValueItems('Nav', 'position'), NavPositionBiz::allMap()); } public static function first() { goto YF4Yl; jAbtb: $bhy2e = array_keys($KgN71); goto zTchM; YF4Yl: $KgN71 = self::getList(); goto jAbtb; zTchM: return array_shift($bhy2e); goto zxdjv; zxdjv: } }