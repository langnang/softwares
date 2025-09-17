<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Biz; class BannerPosition extends AbstractBannerPositionBiz { private $name; private $title; public static function make($AfXAM, $jTNJC) { goto CTZux; BIQ5k: return $AIK5r; goto hZeu3; IZOHo: $AIK5r->title = $jTNJC; goto BIQ5k; fe8KK: $AIK5r->name = $AfXAM; goto IZOHo; CTZux: $AIK5r = new static(); goto fe8KK; hZeu3: } public function name() { return $this->name; } public function title() { return $this->title; } }