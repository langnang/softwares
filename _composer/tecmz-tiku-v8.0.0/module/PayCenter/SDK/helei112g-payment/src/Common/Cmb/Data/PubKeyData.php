<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Cmb\Data; use Payment\Common\CmbConfig; class PubKeyData extends CmbBaseData { protected function getReqData() { $sx3MN = array('dateTime' => $this->dateTime, 'branchNo' => $this->branchNo, 'merchantNo' => $this->merchantNo, 'txCode' => CmbConfig::TRADE_CODE); return $sx3MN; } }