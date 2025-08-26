<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Util; use Illuminate\Support\Facades\Cache; use ModStart\Core\Dao\ModelUtil; use Module\Banner\Type\BannerPosition; class BannerUtil { const CACHE_KEY_PREFIX = 'banner:'; public static function listByPosition($aWLu8 = 'home') { return ModelUtil::model('banner')->where(array('position' => $aWLu8))->orderBy('sort', 'asc')->get()->toArray(); } public static function listByPositionWithCache($aWLu8 = 'home', $zt7Oy = 60) { return Cache::remember(self::CACHE_KEY_PREFIX . $aWLu8, $zt7Oy, function () use($aWLu8) { return self::listByPosition($aWLu8); }); } public static function insertIfMissing($aWLu8, $WAiaw) { $WAiaw['position'] = $aWLu8; if (!ModelUtil::exists('banner', $WAiaw)) { ModelUtil::insert('banner', $WAiaw); } } public static function hasData($aWLu8 = 'home') { return !empty(self::listByPositionWithCache($aWLu8)); } public static function clearCache() { foreach (BannerPosition::getList() as $hBBDL => $eEo37) { Cache::forget(self::CACHE_KEY_PREFIX . $hBBDL); } } }