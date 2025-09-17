<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ class MNav { public static function all($aWLu8 = 'head') { goto tpKqQ; zIRtN: return $VxRpT; goto PnBrp; XVbzF: foreach ($VxRpT as $VL8Aw => $p4EDY) { $VxRpT[$VL8Aw]['_attr'] = \Module\Nav\Type\NavOpenType::getBlankAttributeFromValue($p4EDY); } goto zIRtN; tpKqQ: $VxRpT = \Module\Nav\Util\NavUtil::listByPositionWithCache($aWLu8); goto XVbzF; PnBrp: } }