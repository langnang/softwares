<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\AdminManager\Util; use ModStart\ModStart; use ModStart\Module\ModuleManager; class ModuleUtil { public static function modules() { goto o1LdA; EM3QW: return $g3C1V; goto JHmLI; o1LdA: $g3C1V = array(); goto sBIni; iUGJk: foreach (ModuleManager::listAllEnabledModules() as $bgpWq => $eEo37) { goto Fy9e2; s1BCv: $g3C1V[] = "{$bgpWq}:{$zoCJb['version']}"; goto c34cp; Fy9e2: $zoCJb = ModuleManager::getModuleBasic($bgpWq); goto eM8tL; eM8tL: if (!$zoCJb) { continue; } goto s1BCv; c34cp: } goto EM3QW; sBIni: $g3C1V[] = 'ModStart:' . ModStart::$version; goto iUGJk; JHmLI: } }