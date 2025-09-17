<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Client; use Payment\Common\PayException; use Payment\Config; use Payment\HelperContext; class Helper { private static $supportChannel = array(Config::CMB_BIND, Config::CMB_PUB_KEY); protected static $instance; protected static function getInstance($ghw00, $qc0K6) { goto Xw7ou; Xw7ou: mb_internal_encoding('UTF-8'); goto eDA9j; eDA9j: if (is_null(self::$instance)) { static::$instance = new HelperContext(); } goto QjZUp; QjZUp: try { static::$instance->initHelper($ghw00, $qc0K6); } catch (PayException $knlzD) { throw $knlzD; } goto fQb4Z; fQb4Z: return static::$instance; goto aDnBq; aDnBq: } public static function run($ghw00, $qc0K6, array $wnvz7 = array()) { goto nUoTF; JkrPa: try { $BM5_h = self::getInstance($ghw00, $qc0K6); $BEdDh = $BM5_h->helper($wnvz7); } catch (PayException $knlzD) { throw $knlzD; } goto QjgRe; nUoTF: if (!in_array($ghw00, self::$supportChannel)) { throw new PayException('sdk当前不支持该渠道，当前仅支持：' . implode(',', self::$supportChannel)); } goto JkrPa; QjgRe: return $BEdDh; goto Xxt21; Xxt21: } }