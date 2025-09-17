<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ class MNav { public static function all($OE9zh = 'head') { goto OfYdX; vHmHm: foreach ($v39Ud as $l3Jim => $NIxlc) { $v39Ud[$l3Jim]['_attr'] = \Module\Nav\Type\NavOpenType::getBlankAttributeFromValue($NIxlc); } goto uMLfJ; OfYdX: $v39Ud = \Module\Nav\Util\NavUtil::listByPositionWithCache($OE9zh); goto vHmHm; uMLfJ: return $v39Ud; goto mx_7n; mx_7n: } }