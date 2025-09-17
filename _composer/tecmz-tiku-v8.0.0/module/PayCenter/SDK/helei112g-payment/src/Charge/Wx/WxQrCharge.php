<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Wx; use Payment\Common\Weixin\Data\Charge\QrChargeData; use Payment\Common\Weixin\WxBaseStrategy; class WxQrCharge extends WxBaseStrategy { public function getBuildDataClass() { $this->config->tradeType = 'NATIVE'; return QrChargeData::class; } protected function retData(array $BEdDh) { if ($this->config->returnRaw) { return $BEdDh; } return $BEdDh['code_url']; } }