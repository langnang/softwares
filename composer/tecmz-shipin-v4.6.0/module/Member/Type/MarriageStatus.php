<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Type; use ModStart\Core\Type\BaseType; class MarriageStatus implements BaseType { const NOT_MARRIED = 1; const DIVORCED = 2; const WIDOWED = 3; const MARRIED = 4; public static function getList() { return array(self::NOT_MARRIED => '未婚', self::DIVORCED => '离异', self::WIDOWED => '丧偶', self::MARRIED => '已婚'); } }