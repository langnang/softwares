<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Module\Banner\Util\BannerUtil; class MBanner { public static function all($OE9zh = 'home') { return BannerUtil::listByPositionWithCache($OE9zh); } }