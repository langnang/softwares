<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Wx; use Payment\Common\Weixin\Data\BackPubChargeData; use Payment\Common\Weixin\Data\Charge\PubChargeData; use Payment\Common\Weixin\WxBaseStrategy; class WxPubCharge extends WxBaseStrategy { public function getBuildDataClass() { $this->config->tradeType = 'JSAPI'; return PubChargeData::class; } protected function retData(array $BEdDh) { goto sEZSP; sEZSP: $tWEm5 = new BackPubChargeData($this->config, $BEdDh); goto JWxtm; gJks_: unset($PEGEV['sign']); goto Ixfh3; xKk6m: $PEGEV['paySign'] = $PEGEV['sign']; goto gJks_; Ixfh3: return $PEGEV; goto ooFT7; bOCfd: $PEGEV = $tWEm5->getData(); goto xKk6m; JWxtm: $tWEm5->setSign(); goto bOCfd; ooFT7: } }