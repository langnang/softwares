<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Client; use Payment\RedContext; use Payment\Common\PayException; use Payment\Config; class Red { private static $supportChannel = array(Config::ALI_RED, Config::WX_RED); protected static $instance; protected static function getInstance($ghw00, $qc0K6) { goto oNKdq; M2WEP: try { static::$instance->initRed($ghw00, $qc0K6); } catch (PayException $knlzD) { throw $knlzD; } goto Spj_d; PGCIq: if (is_null(self::$instance)) { static::$instance = new RedContext(); } goto M2WEP; Spj_d: return static::$instance; goto M1c0b; oNKdq: mb_internal_encoding('UTF-8'); goto PGCIq; M1c0b: } public static function run($ghw00, $qc0K6, $wnvz7) { goto cW7pm; QwoMy: return $BEdDh; goto YGo6e; t1nba: try { $BM5_h = self::getInstance($ghw00, $qc0K6); $BEdDh = $BM5_h->red($wnvz7); } catch (PayException $knlzD) { throw $knlzD; } goto QwoMy; cW7pm: if (!in_array($ghw00, self::$supportChannel)) { throw new PayException('sdk当前不支持该支付渠道，当前仅支持：' . implode(',', self::$supportChannel)); } goto t1nba; YGo6e: } }