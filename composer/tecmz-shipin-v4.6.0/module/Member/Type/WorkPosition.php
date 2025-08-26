<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Type; use ModStart\Core\Type\BaseType; class WorkPosition implements BaseType { public static function getList() { goto r5YN3; r5YN3: static $iMATK = null; goto C1G_g; u53ng: return $iMATK; goto v0TaM; C1G_g: if (null === $iMATK) { $iMATK = array(); foreach (array('普通职工', '中层管理者', '高层管理者', '企业主') as $qlKQK) { $iMATK[$qlKQK] = $qlKQK; } } goto u53ng; v0TaM: } }