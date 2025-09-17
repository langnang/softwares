<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Wx; use Payment\Common\Weixin\Data\Charge\BarChargeData; use Payment\Common\Weixin\WxBaseStrategy; use Payment\Common\WxConfig; class WxBarCharge extends WxBaseStrategy { protected $reqUrl = 'https://api.mch.weixin.qq.com/{debug}/pay/micropay'; public function getBuildDataClass() { return BarChargeData::class; } protected function retData(array $BEdDh) { goto Z1IFs; jlXed: return $BEdDh; goto DZfHV; fgc6L: if ($this->config->returnRaw) { return $BEdDh; } goto jlXed; iWJin: $BEdDh['cash_fee'] = bcdiv($BEdDh['cash_fee'], 100, 2); goto fgc6L; Z1IFs: $BEdDh['total_fee'] = bcdiv($BEdDh['total_fee'], 100, 2); goto iWJin; DZfHV: } }