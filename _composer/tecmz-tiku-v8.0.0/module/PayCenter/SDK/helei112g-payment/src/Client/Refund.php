<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Client; use Payment\Common\PayException; use Payment\Config; use Payment\RefundContext; class Refund { private static $supportChannel = array(Config::ALI_REFUND, Config::WX_REFUND, Config::CMB_REFUND, 'applepay_upacp'); protected static $instance; protected static function getInstance($ghw00, $qc0K6) { goto HvTFa; ER4mP: try { static::$instance->initRefund($ghw00, $qc0K6); } catch (PayException $knlzD) { throw $knlzD; } goto X4O0q; HvTFa: mb_internal_encoding('UTF-8'); goto eJfXL; X4O0q: return static::$instance; goto ZZ178; eJfXL: if (is_null(self::$instance)) { static::$instance = new RefundContext(); } goto ER4mP; ZZ178: } public static function run($ghw00, $qc0K6, $RzrBM) { goto dP1kv; OC3vX: return $BEdDh; goto ZXIqN; jwZh4: try { $BM5_h = self::getInstance($ghw00, $qc0K6); $BEdDh = $BM5_h->refund($RzrBM); } catch (PayException $knlzD) { throw $knlzD; } goto OC3vX; dP1kv: if (!in_array($ghw00, self::$supportChannel)) { throw new PayException('sdk当前不支持该退款渠道，当前仅支持：' . implode(',', self::$supportChannel)); } goto jwZh4; ZXIqN: } }