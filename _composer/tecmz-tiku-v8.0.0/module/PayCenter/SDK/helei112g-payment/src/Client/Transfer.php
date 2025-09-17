<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Client; use Payment\Common\PayException; use Payment\Config; use Payment\TransferContext; class Transfer { private static $supportChannel = array(Config::ALI_TRANSFER, Config::WX_TRANSFER, 'cmb_wallet', 'applepay_upacp'); protected static $instance; protected static function getInstance($ghw00, $qc0K6) { goto q5v6V; r2UVY: return static::$instance; goto WhJDt; LpPy6: try { static::$instance->initTransfer($ghw00, $qc0K6); } catch (PayException $knlzD) { throw $knlzD; } goto r2UVY; q5v6V: mb_internal_encoding('UTF-8'); goto V7o40; V7o40: if (is_null(self::$instance)) { static::$instance = new TransferContext(); } goto LpPy6; WhJDt: } public static function run($ghw00, $qc0K6, $wnvz7) { goto r4q2i; r4q2i: if (!in_array($ghw00, self::$supportChannel)) { throw new PayException('sdk当前不支持该退款渠道，当前仅支持：' . implode(',', self::$supportChannel)); } goto dLFwr; dLFwr: try { $BM5_h = self::getInstance($ghw00, $qc0K6); $BEdDh = $BM5_h->transfer($wnvz7); } catch (PayException $knlzD) { throw $knlzD; } goto m2NVT; m2NVT: return $BEdDh; goto dbeJk; dbeJk: } }