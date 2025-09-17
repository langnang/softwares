<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Type; use ModStart\Core\Type\BaseType; class BannerType implements BaseType { const IMAGE = 1; const IMAGE_TITLE_SLOGAN_LINK = 2; const VIDEO = 3; public static function getList() { return array(self::IMAGE => '图片', self::IMAGE_TITLE_SLOGAN_LINK => '图片+标题+描述+链接', self::VIDEO => '视频'); } }