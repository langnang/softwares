<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common; abstract class ConfigInterface { public $returnRaw = true; public $useSandbox = true; public $limitPay; public $notifyUrl; public $signType = 'RSA'; public function toArray() { return get_object_vars($this); } public final function __construct(array $qc0K6) { try { $this->initConfig($qc0K6); } catch (PayException $knlzD) { throw $knlzD; } } protected abstract function initConfig(array $qc0K6); }