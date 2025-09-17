<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Biz; class BannerPosition extends AbstractBannerPositionBiz { private $name; private $title; public static function make($FPiC8, $gbyXi) { goto N2wM1; fo9ps: $MY20n->title = $gbyXi; goto WCG3S; N2wM1: $MY20n = new static(); goto I6ZxF; WCG3S: return $MY20n; goto K_MgG; I6ZxF: $MY20n->name = $FPiC8; goto fo9ps; K_MgG: } public function name() { return $this->name; } public function title() { return $this->title; } }