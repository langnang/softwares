<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Ali; use Payment\Common\Ali\AliBaseStrategy; use Payment\Common\Ali\Data\Charge\BarChargeData; use Payment\Common\PayException; class AliBarCharge extends AliBaseStrategy { protected $method = 'alipay.trade.pay'; public function getBuildDataClass() { $this->config->method = $this->method; return BarChargeData::class; } protected function retData(array $BEdDh) { goto uqDxn; uqDxn: $sx3MN = parent::retData($BEdDh); goto Hrs7j; fk8JX: return $GeXSC; goto DcnOI; Hrs7j: try { $GeXSC = $this->sendReq($sx3MN); } catch (PayException $knlzD) { throw $knlzD; } goto i2KHu; i2KHu: if ($GeXSC['code'] !== '10000') { new PayException($GeXSC['sub_msg']); } goto fk8JX; DcnOI: } }