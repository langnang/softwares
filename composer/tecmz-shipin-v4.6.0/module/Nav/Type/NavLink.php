<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Type; class NavLink { public static function generate($QIg1n, $EeGOj = array()) { goto kzJxf; kzJxf: if (empty($QIg1n)) { return ''; } goto oQBGE; C3_qW: if (!empty($EeGOj)) { $bhy2e = array_map(function ($qlKQK) { return '{' . $qlKQK . '}'; }, array_keys($EeGOj)); $QIg1n = str_replace($bhy2e, array_values($EeGOj), $QIg1n); } goto l9zqn; l9zqn: return $QIg1n; goto m6rD3; oQBGE: if (is_array($QIg1n)) { $QIg1n = isset($QIg1n['link']) ? $QIg1n['link'] : null; } goto C3_qW; m6rD3: } }