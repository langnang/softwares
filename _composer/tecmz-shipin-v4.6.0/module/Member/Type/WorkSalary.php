<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Type; use ModStart\Core\Type\BaseType; class WorkSalary implements BaseType { public static function getList() { goto gOAdw; OYGVQ: return $iMATK; goto JrKEk; gOAdw: static $iMATK = null; goto kgIsL; kgIsL: if (null === $iMATK) { $iMATK = array(); foreach (array('2000元以下', '2000-3999元', '4000-5999元', '6000-9999元', '10000-14999元', '15000-19999元', '20000-49999元', '50000元以上') as $qlKQK) { $iMATK[$qlKQK] = $qlKQK; } } goto OYGVQ; JrKEk: } }