<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Biz; class QuickBannerPositionBiz extends AbstractBannerPositionBiz { protected $name; protected $title; public static function make($FPiC8, $gbyXi) { goto yshRz; sVZXB: $gsYY4->name = $FPiC8; goto cgFT1; ZsZ7f: return $gsYY4; goto Cxgya; yshRz: $gsYY4 = new static(); goto sVZXB; cgFT1: $gsYY4->title = $gbyXi; goto ZsZ7f; Cxgya: } public function name() { return $this->name; } public function title() { return $this->title; } }