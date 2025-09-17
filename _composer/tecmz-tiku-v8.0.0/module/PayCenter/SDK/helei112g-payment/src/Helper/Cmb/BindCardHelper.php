<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Helper\Cmb; use Payment\Common\Cmb\CmbBaseStrategy; use Payment\Common\Cmb\Data\BindCardData; class BindCardHelper extends CmbBaseStrategy { public function getBuildDataClass() { goto OkbJe; BgOr5: if ($this->config->useSandbox) { $this->config->getewayUrl = 'http://121.15.180.66:801/mobilehtml/DebitCard/M_NetPay/OneNetRegister/NP_BindCard.aspx'; } goto T9slh; T9slh: return BindCardData::class; goto vmSVU; OkbJe: $this->config->getewayUrl = 'https://mobile.cmbchina.com/mobilehtml/DebitCard/M_NetPay/OneNetRegister/NP_BindCard.aspx'; goto BgOr5; vmSVU: } }