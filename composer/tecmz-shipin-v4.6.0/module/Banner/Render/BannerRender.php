<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Render; use Illuminate\Support\Facades\View; class BannerRender { public static function position($aWLu8, $Eic4v = '1400x400', $nW9Gv = '5-2', $oNLtH = '3-2', $YytjP = false) { goto vltiZ; trnmU: if (null === $nW9Gv) { $nW9Gv = '5-2'; } goto q5HrW; iKbla: if (null === $YytjP) { $YytjP = false; } goto RxJ35; vltiZ: if (null === $Eic4v) { $Eic4v = '1400x400'; } goto trnmU; RxJ35: return View::make('module::Banner.View.pc.public.banner', array('position' => $aWLu8, 'bannerSize' => $Eic4v, 'bannerRatio' => $nW9Gv, 'mobileBannerRatio' => $oNLtH, 'round' => $YytjP))->render(); goto cK4pe; q5HrW: if (null === $oNLtH) { $oNLtH = '1-1'; } goto iKbla; cK4pe: } }