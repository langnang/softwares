<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use Module\Vendor\Provider\Captcha\CaptchaProvider; class SecurityUtil { public static function registerCaptchaProvider() { goto LVS1w; spsyK: $qhOVL->setParam('onValidate', 'window.__memberCheckCaptcha'); goto iQ_d9; MXP2K: $qhOVL = CaptchaProvider::get($AfXAM); goto spsyK; iQ_d9: return $qhOVL; goto e4GJ1; LVS1w: $AfXAM = modstart_config('Member_RegisterCaptchaProvider', null); goto Yv23w; Yv23w: if (empty($AfXAM)) { return null; } goto MXP2K; e4GJ1: } public static function loginCaptchaProvider() { goto sPPPi; DKXlu: $qhOVL = CaptchaProvider::get($AfXAM); goto xbNw6; vl3g3: if (empty($AfXAM)) { return null; } goto DKXlu; xbNw6: return $qhOVL; goto fe_OM; sPPPi: $AfXAM = modstart_config('loginCaptchaProvider', null); goto vl3g3; fe_OM: } }