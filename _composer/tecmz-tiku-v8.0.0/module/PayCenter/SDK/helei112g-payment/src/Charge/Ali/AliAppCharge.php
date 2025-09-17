<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Ali; use Payment\Common\Ali\AliBaseStrategy; use Payment\Common\Ali\Data\Charge\AppChargeData; class AliAppCharge extends AliBaseStrategy { protected $method = 'alipay.trade.app.pay'; public function getBuildDataClass() { $this->config->method = $this->method; return AppChargeData::class; } protected function retData(array $GeXSC) { $GeXSC = parent::retData($GeXSC); return http_build_query($GeXSC); } }