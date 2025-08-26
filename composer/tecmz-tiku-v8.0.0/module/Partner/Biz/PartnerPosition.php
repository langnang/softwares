<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Biz; class PartnerPosition extends AbstractPartnerPositionBiz { private $name; private $title; public static function make($AfXAM, $jTNJC) { goto UPOzL; yzEjc: $AIK5r->name = $AfXAM; goto mIiBc; mIiBc: $AIK5r->title = $jTNJC; goto uJ2hu; uJ2hu: return $AIK5r; goto y_b4Z; UPOzL: $AIK5r = new static(); goto yzEjc; y_b4Z: } public function name() { return $this->name; } public function title() { return $this->title; } }