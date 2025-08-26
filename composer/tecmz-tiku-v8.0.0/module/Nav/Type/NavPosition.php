<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; use ModStart\Core\Type\BaseType; use ModStart\Module\ModuleManager; use Module\Nav\Biz\NavPositionBiz; class NavPosition implements BaseType { public static function getList() { return array_merge(ModuleManager::getModuleConfigKeyValueItems('Nav', 'position'), NavPositionBiz::allMap()); } public static function first() { goto e8M1v; e8M1v: $x6JEB = self::getList(); goto K3qsX; K3qsX: $GQdfA = array_keys($x6JEB); goto DZFrf; DZFrf: return array_shift($GQdfA); goto Ym74l; Ym74l: } }