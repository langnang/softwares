<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment; use Payment\Common\BaseStrategy; use Payment\Common\PayException; use Payment\Refund\AliRefund; use Payment\Refund\CmbRefund; use Payment\Refund\WxRefund; class RefundContext { protected $refund; public function initRefund($ghw00, array $qc0K6) { try { switch ($ghw00) { case Config::ALI_REFUND: $this->refund = new AliRefund($qc0K6); break; case Config::WX_REFUND: $this->refund = new WxRefund($qc0K6); break; case Config::CMB_REFUND: $this->refund = new CmbRefund($qc0K6); break; default: throw new PayException('当前仅支持：ALI WEIXIN CMB'); } } catch (PayException $knlzD) { throw $knlzD; } } public function refund(array $GeXSC) { if (!$this->refund instanceof BaseStrategy) { throw new PayException('请检查初始化是否正确'); } try { return $this->refund->handle($GeXSC); } catch (PayException $knlzD) { throw $knlzD; } } }