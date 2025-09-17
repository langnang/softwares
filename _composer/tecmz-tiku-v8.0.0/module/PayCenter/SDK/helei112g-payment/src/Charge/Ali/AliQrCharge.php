<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Ali; use Payment\Common\Ali\AliBaseStrategy; use Payment\Common\Ali\Data\Charge\QrChargeData; use Payment\Common\AliConfig; use Payment\Common\PayException; class AliQrCharge extends AliBaseStrategy { protected $method = 'alipay.trade.precreate'; public function getBuildDataClass() { $this->config->method = $this->method; return QrChargeData::class; } protected function retData(array $BEdDh) { goto bW2Bz; V2xgv: if ($GeXSC['code'] !== '10000') { throw new PayException($GeXSC['sub_msg']); } goto xJSkv; xJSkv: return $GeXSC['qr_code']; goto hUvHq; RfENU: try { $GeXSC = $this->sendReq($OuCnz); } catch (PayException $knlzD) { throw $knlzD; } goto V2xgv; bW2Bz: $OuCnz = parent::retData($BEdDh); goto RfENU; hUvHq: } }