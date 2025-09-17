<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Type; use ModStart\Core\Type\BaseType; class WorkPosition implements BaseType { public static function getList() { goto jOgjr; X8tkJ: return $TbleL; goto yCWph; PvcrT: if (null === $TbleL) { $TbleL = array(); foreach (array('普通职工', '中层管理者', '高层管理者', '企业主') as $REa1I) { $TbleL[$REa1I] = $REa1I; } } goto X8tkJ; jOgjr: static $TbleL = null; goto PvcrT; yCWph: } }