<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Wx; use Payment\Common\Weixin\Data\BackAppChargeData; use Payment\Common\Weixin\Data\Charge\AppChargeData; use Payment\Common\Weixin\WxBaseStrategy; class WxAppCharge extends WxBaseStrategy { public function getBuildDataClass() { $this->config->tradeType = 'APP'; return AppChargeData::class; } protected function retData(array $BEdDh) { goto o9Fj3; WO29T: $PEGEV = $tWEm5->getData(); goto ZVGCp; o9Fj3: $tWEm5 = new BackAppChargeData($this->config, $BEdDh); goto Qwdhe; Qwdhe: $tWEm5->setSign(); goto WO29T; ZVGCp: return $PEGEV; goto N8dU3; N8dU3: } }