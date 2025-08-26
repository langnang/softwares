<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment; use Payment\Notify\AliNotify; use Payment\Notify\CmbNotify; use Payment\Notify\NotifyStrategy; use Payment\Notify\PayNotifyInterface; use Payment\Notify\WxNotify; use Payment\Common\PayException; class NotifyContext { protected $notify; public function initNotify($ghw00, array $qc0K6) { try { switch ($ghw00) { case Config::ALI_CHARGE: $this->notify = new AliNotify($qc0K6); break; case Config::WX_CHARGE: $this->notify = new WxNotify($qc0K6); break; case Config::CMB_CHARGE: $this->notify = new CmbNotify($qc0K6); break; default: throw new PayException('当前仅支持：ALI_CHARGE WX_CHARGE CMB_CHARGE 常量'); } } catch (PayException $knlzD) { throw $knlzD; } } public function getNotifyData() { return $this->notify->getNotifyData(); } public function notify(PayNotifyInterface $FraYe) { if (!$this->notify instanceof NotifyStrategy) { throw new PayException('请检查初始化是否正确'); } return $this->notify->handle($FraYe); } }