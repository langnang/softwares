<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\AdminManager\Util; use ModStart\ModStart; use ModStart\Module\ModuleManager; class ModuleUtil { public static function modules() { goto YLg2R; SwYR7: foreach (ModuleManager::listAllEnabledModules() as $nq5ti => $GmKGX) { goto PEkiI; xuZi9: if (!$kkerk) { continue; } goto Yb2C8; Yb2C8: $he5d7[] = "{$nq5ti}:{$kkerk['version']}"; goto SteL4; PEkiI: $kkerk = ModuleManager::getModuleBasic($nq5ti); goto xuZi9; SteL4: } goto C_TUh; C_TUh: return $he5d7; goto ZXRSd; YLg2R: $he5d7 = array(); goto m5tuc; m5tuc: $he5d7[] = 'ModStart:' . ModStart::$version; goto SwYR7; ZXRSd: } }