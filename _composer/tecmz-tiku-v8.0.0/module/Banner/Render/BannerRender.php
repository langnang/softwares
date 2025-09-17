<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Render; use Illuminate\Support\Facades\View; class BannerRender { public static function position($OE9zh, $pOk8Z = '1400x400', $bE_z3 = '5-2', $M5xFl = '3-2', $rGONV = false) { goto QIQg7; xRc1V: if (null === $rGONV) { $rGONV = false; } goto ukBo6; A43sF: if (null === $bE_z3) { $bE_z3 = '5-2'; } goto g4jjD; QIQg7: if (null === $pOk8Z) { $pOk8Z = '1400x400'; } goto A43sF; ukBo6: return View::make('module::Banner.View.pc.public.banner', array('position' => $OE9zh, 'bannerSize' => $pOk8Z, 'bannerRatio' => $bE_z3, 'mobileBannerRatio' => $M5xFl, 'round' => $rGONV))->render(); goto OF5Yi; g4jjD: if (null === $M5xFl) { $M5xFl = '1-1'; } goto xRc1V; OF5Yi: } }