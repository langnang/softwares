<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Cmb\Data; use Payment\Common\BaseData; use Payment\Common\PayException; use Payment\Utils\ArrayUtil; abstract class CmbBaseData extends BaseData { protected function makeSign($IRvxP) { switch ($this->signType) { case 'SHA-256': $GtgYE = hash('sha256', "{$IRvxP}&{$this->merKey}"); break; default: $GtgYE = ''; } return $GtgYE; } protected function buildData() { $ja3LF = array('version' => $this->version, 'charset' => $this->charset, 'signType' => $this->signType, 'reqData' => $this->getReqData()); $this->retData = ArrayUtil::paraFilter($ja3LF); } protected function checkDataParam() { goto sP46j; bx6le: $Hk_lH = $this->merchantNo; goto AD033; zXWaz: if (empty($Hk_lH) || mb_strlen($Hk_lH) !== 6) { throw new PayException('商户号，6位数字'); } goto AyI2x; sP46j: $f7wE5 = $this->branchNo; goto bx6le; AD033: if (empty($f7wE5) || mb_strlen($f7wE5) !== 4) { throw new PayException('商户分行号，4位数字'); } goto zXWaz; AyI2x: } protected abstract function getReqData(); }