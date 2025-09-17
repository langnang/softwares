<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment; use Payment\Common\BaseStrategy; use Payment\Common\PayException; use Payment\Helper\Cmb\BindCardHelper; use Payment\Helper\Cmb\PubKeyHelper; class HelperContext { protected $helper; public function initHelper($vsi_J, array $qc0K6) { try { switch ($vsi_J) { case Config::CMB_BIND: $this->helper = new BindCardHelper($qc0K6); break; case Config::CMB_PUB_KEY: $this->helper = new PubKeyHelper($qc0K6); break; default: throw new PayException('当前仅支持：CMB_BIND CMB_PUB_KEY 操作'); } } catch (PayException $knlzD) { throw $knlzD; } } public function helper(array $GeXSC) { if (!$this->helper instanceof BaseStrategy) { throw new PayException('请检查初始化是否正确'); } try { return $this->helper->handle($GeXSC); } catch (PayException $knlzD) { throw $knlzD; } } }