<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; class NavLink { public static function generate($cu6TE, $oG0tD = array()) { goto gqBgF; fXTne: return $cu6TE; goto tQY8X; j0I99: if (!empty($oG0tD)) { $GQdfA = array_map(function ($REa1I) { return '{' . $REa1I . '}'; }, array_keys($oG0tD)); $cu6TE = str_replace($GQdfA, array_values($oG0tD), $cu6TE); } goto fXTne; gqBgF: if (empty($cu6TE)) { return ''; } goto XSSUA; XSSUA: if (is_array($cu6TE)) { $cu6TE = isset($cu6TE['link']) ? $cu6TE['link'] : null; } goto j0I99; tQY8X: } }