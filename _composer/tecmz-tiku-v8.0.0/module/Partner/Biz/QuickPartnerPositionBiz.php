<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Biz; class QuickPartnerPositionBiz extends AbstractPartnerPositionBiz { protected $name; protected $title; public static function make($AfXAM, $jTNJC) { goto qAaLo; SPsXD: return $vY60h; goto MfSHC; qAaLo: $vY60h = new static(); goto awsHI; kyiiP: $vY60h->title = $jTNJC; goto SPsXD; awsHI: $vY60h->name = $AfXAM; goto kyiiP; MfSHC: } public function name() { return $this->name; } public function title() { return $this->title; } }