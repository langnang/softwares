<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; use ModStart\Core\Type\BaseType; class NavOpenType implements BaseType { const CURRENT_WINDOW = 1; const NEW_BLANK = 2; public static function getList() { return array(self::CURRENT_WINDOW => '当前窗口', self::NEW_BLANK => '新窗口'); } public static function getBlankAttributeFromValue($UXBTE) { goto OcFaV; keqVh: if (is_array($UXBTE)) { $UXBTE = isset($UXBTE['openType']) ? $UXBTE['openType'] : null; } goto xAO0F; xAO0F: switch ($UXBTE) { case self::NEW_BLANK: return 'target="_blank"'; } goto rinPY; OcFaV: if (empty($UXBTE)) { return ''; } goto keqVh; rinPY: return ''; goto GCmDD; GCmDD: } }