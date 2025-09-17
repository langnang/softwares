<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Charge\Ccb; use Payment\Common\Ccb\CmbBaseStrategy; use Payment\Common\Ccb\Data\Charge\ChargeData; class CcbCharge extends CcbBaseStrategy { public function getBuildDataClass() { $this->config->getewayUrl = 'https://ibsbjstar.ccb.com.cn/CCBIS/ccbMain'; return ChargeData::class; } }