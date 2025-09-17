<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Util; use Illuminate\Support\Facades\Cache; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Dao\ModelUtil; use Module\Partner\Type\PartnerPosition; class PartnerUtil { const CACHE_KEY_PREFIX = 'partner:'; public static function listByPosition($OE9zh = 'home') { goto RyOjf; N7nYZ: return $v39Ud; goto CFSVZ; RyOjf: $v39Ud = ModelUtil::model('partner')->where(array('position' => $OE9zh, 'enable' => true))->orderBy('sort', 'asc')->get()->toArray(); goto MbHlL; MbHlL: foreach ($v39Ud as $nJFbs => $NIxlc) { if (!empty($NIxlc['logo'])) { $v39Ud[$nJFbs]['logo'] = AssetsUtil::fixFull($NIxlc['logo']); } } goto N7nYZ; CFSVZ: } public static function listByPositionWithCache($OE9zh = 'home', $PqSsx = 60) { return Cache::remember(self::CACHE_KEY_PREFIX . $OE9zh, $PqSsx, function () use($OE9zh) { return self::listByPosition($OE9zh); }); } public static function clearCache() { foreach (PartnerPosition::getList() as $nJFbs => $GmKGX) { Cache::forget(self::CACHE_KEY_PREFIX . $nJFbs); } } }