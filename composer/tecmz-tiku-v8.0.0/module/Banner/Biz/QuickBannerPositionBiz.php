<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Biz; class QuickBannerPositionBiz extends AbstractBannerPositionBiz { protected $name; protected $title; public static function make($AfXAM, $jTNJC) { goto m2qR3; raCR2: $vY60h->title = $jTNJC; goto dAKAs; m2qR3: $vY60h = new static(); goto z783m; dAKAs: return $vY60h; goto SJAIj; z783m: $vY60h->name = $AfXAM; goto raCR2; SJAIj: } public function name() { return $this->name; } public function title() { return $this->title; } }