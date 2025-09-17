<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Util; use Illuminate\Support\Facades\Cache; use ModStart\Core\Dao\ModelUtil; use Module\Banner\Type\BannerPosition; class BannerUtil { const CACHE_KEY_PREFIX = 'banner:'; public static function listByPosition($OE9zh = 'home') { return ModelUtil::model('banner')->where(array('position' => $OE9zh))->orderBy('sort', 'asc')->get()->toArray(); } public static function listByPositionWithCache($OE9zh = 'home', $PqSsx = 60) { return Cache::remember(self::CACHE_KEY_PREFIX . $OE9zh, $PqSsx, function () use($OE9zh) { return self::listByPosition($OE9zh); }); } public static function insertIfMissing($OE9zh, $GeXSC) { $GeXSC['position'] = $OE9zh; if (!ModelUtil::exists('banner', $GeXSC)) { ModelUtil::insert('banner', $GeXSC); } } public static function hasData($OE9zh = 'home') { return !empty(self::listByPositionWithCache($OE9zh)); } public static function clearCache() { foreach (BannerPosition::getList() as $nJFbs => $GmKGX) { Cache::forget(self::CACHE_KEY_PREFIX . $nJFbs); } } }