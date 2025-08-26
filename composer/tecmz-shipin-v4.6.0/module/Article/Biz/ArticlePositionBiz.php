<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Biz; use Module\Vendor\Biz\BizTrait; class ArticlePositionBiz { use BizTrait; public static function all() { return self::listAll(); } public static function get($FPiC8) { return self::getByName($FPiC8); } }