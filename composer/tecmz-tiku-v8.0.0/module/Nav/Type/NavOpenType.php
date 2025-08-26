<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; use ModStart\Core\Type\BaseType; class NavOpenType implements BaseType { const CURRENT_WINDOW = 1; const NEW_BLANK = 2; public static function getList() { return array(self::CURRENT_WINDOW => '当前窗口', self::NEW_BLANK => '新窗口'); } public static function getBlankAttributeFromValue($b4pDG) { goto bqSGy; jONWj: switch ($b4pDG) { case self::NEW_BLANK: return 'target="_blank"'; } goto rvomu; rvomu: return ''; goto FG3cl; C0aPj: if (is_array($b4pDG)) { $b4pDG = isset($b4pDG['openType']) ? $b4pDG['openType'] : null; } goto jONWj; bqSGy: if (empty($b4pDG)) { return ''; } goto C0aPj; FG3cl: } }