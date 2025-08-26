<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Biz; class NavPosition extends AbstractNavPositionBiz { private $name; private $title; public static function make($FPiC8, $gbyXi) { goto ZAD_d; KtGVO: $MY20n->name = $FPiC8; goto KB2DR; ZAD_d: $MY20n = new static(); goto KtGVO; Rf8Ii: return $MY20n; goto WFy5Q; KB2DR: $MY20n->title = $gbyXi; goto Rf8Ii; WFy5Q: } public function name() { return $this->name; } public function title() { return $this->title; } }