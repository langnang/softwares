<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data\Query; use Payment\Common\PayException; use Payment\Common\Weixin\Data\WxBaseData; use Payment\Utils\ArrayUtil; class RedQueryData extends WxBaseData { protected function buildData() { goto qD9c0; EoUk5: $this->retData = ArrayUtil::paraFilter($this->retData); goto BhAY7; VCATk: $wiDTr = $this->appId; goto AeO71; qD9c0: if ($this->submch) { $wiDTr = $this->sub_appid; $gLW3v = $this->sub_mch_id; } else { $wiDTr = $this->appId; $gLW3v = $this->mchId; } goto VCATk; hSO6C: $this->retData = array('appid' => $wiDTr, 'mch_id' => $gLW3v, 'nonce_str' => $this->nonceStr, 'mch_billno' => $this->mch_billno, 'bill_type' => $this->bill_type); goto EoUk5; AeO71: $gLW3v = $this->mchId; goto hSO6C; BhAY7: } protected function checkDataParam() { goto gJ53S; xkNCI: $pqFHg = $this->bill_type; goto GqxTK; gJ53S: $AdwZD = $this->mch_billno; goto xkNCI; GqxTK: if (empty($AdwZD) && empty($pqFHg)) { throw new PayException('查询红包记录  必须提供商户订单号、订单类型'); } goto Tk2ap; Tk2ap: } }