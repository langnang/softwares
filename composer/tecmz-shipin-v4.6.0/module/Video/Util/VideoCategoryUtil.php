<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Video\Util; use Illuminate\Support\Facades\Cache; use ModStart\Core\Dao\ModelUtil; class VideoCategoryUtil { const PREFIX = 'VideoCategory:'; public static function clearCache() { Cache::forget(self::PREFIX . 'All'); } public static function listCategories() { return Cache::rememberForever(self::PREFIX . 'All', function () { return ModelUtil::model('video_category')->orderBy('sort', 'asc')->get(array('id', 'cover', 'name'))->toArray(); }); } public static function get($wQ1uv) { foreach (self::listCategories() as $Rup27) { if ($Rup27['id'] == $wQ1uv) { return $Rup27; } } return null; } public static function mergeCategories(&$VxRpT) { ModelUtil::join($VxRpT, 'categoryId', '_category', 'video_category', 'id'); } }