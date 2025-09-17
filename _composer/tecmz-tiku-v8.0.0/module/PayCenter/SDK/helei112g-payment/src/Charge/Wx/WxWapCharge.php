<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Wx; use Payment\Common\Weixin\Data\Charge\WapChargeData; use Payment\Common\Weixin\WxBaseStrategy; class WxWapCharge extends WxBaseStrategy { public function getBuildDataClass() { $this->config->tradeType = 'MWEB'; return WapChargeData::class; } protected function retData(array $BEdDh) { goto MgXQv; SVb69: $cYKnj = $BEdDh['mweb_url']; goto kMwk4; MgXQv: if ($this->config->returnRaw) { return $BEdDh; } goto SVb69; GbyTg: return $cYKnj; goto RNDgv; kMwk4: if ($this->config->returnUrl) { $cYKnj .= '&redirect_url=' . urlencode($this->config->returnUrl); } goto GbyTg; RNDgv: } }