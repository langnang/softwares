<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Type; use ModStart\Core\Type\BaseType; class WorkSalary implements BaseType { public static function getList() { goto rlqxW; ha1WT: if (null === $TbleL) { $TbleL = array(); foreach (array('2000元以下', '2000-3999元', '4000-5999元', '6000-9999元', '10000-14999元', '15000-19999元', '20000-49999元', '50000元以上') as $REa1I) { $TbleL[$REa1I] = $REa1I; } } goto Kb0uk; rlqxW: static $TbleL = null; goto ha1WT; Kb0uk: return $TbleL; goto kk93T; kk93T: } }