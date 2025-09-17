<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment; use Payment\Common\BaseStrategy; use Payment\Common\PayException; use Payment\Trans\AliTransfer; use Payment\Trans\WxTransfer; class TransferContext { protected $transfer; public function initTransfer($ghw00, array $qc0K6) { try { switch ($ghw00) { case Config::ALI_TRANSFER: $this->transfer = new AliTransfer($qc0K6); break; case Config::WX_TRANSFER: $this->transfer = new WxTransfer($qc0K6); break; default: throw new PayException('当前仅支持：ALI WEIXIN两个常量'); } } catch (PayException $knlzD) { throw $knlzD; } } public function transfer(array $GeXSC) { if (!$this->transfer instanceof BaseStrategy) { throw new PayException('请检查初始化是否正确'); } try { return $this->transfer->handle($GeXSC); } catch (PayException $knlzD) { throw $knlzD; } } }