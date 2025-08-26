<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Biz; class NavPosition extends AbstractNavPositionBiz { private $name; private $title; public static function make($AfXAM, $jTNJC) { goto lCyOA; KD25w: $AIK5r->title = $jTNJC; goto tqVJK; tqVJK: return $AIK5r; goto ItiOy; lCyOA: $AIK5r = new static(); goto CjjoF; CjjoF: $AIK5r->name = $AfXAM; goto KD25w; ItiOy: } public function name() { return $this->name; } public function title() { return $this->title; } }