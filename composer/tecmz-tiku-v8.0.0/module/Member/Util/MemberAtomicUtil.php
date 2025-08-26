<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use ModStart\Core\Exception\BizException; use Module\Member\Auth\MemberUser; use Module\Vendor\Atomic\AtomicUtil; class MemberAtomicUtil { public static function acquireOrFail($klZBn, $JAbBw, $MqkYF = null, $B2WWU = 30) { if (!self::acquire($JAbBw, $MqkYF, $B2WWU)) { BizException::throws($klZBn); } } public static function acquire($JAbBw, $MqkYF = null, $B2WWU = 30) { goto BLZ4n; BLZ4n: if (null === $MqkYF) { $MqkYF = MemberUser::id(); } goto E7cXl; E7cXl: $Mlv3V = $JAbBw . '_' . $MqkYF; goto FGt0f; FGt0f: return AtomicUtil::acquire($Mlv3V, $B2WWU); goto AzHPH; AzHPH: } public static function release($JAbBw, $MqkYF = null) { goto Dzm9K; FpRw9: $Mlv3V = $JAbBw . '_' . $MqkYF; goto HlYg9; Dzm9K: if (null === $MqkYF) { $MqkYF = MemberUser::id(); } goto FpRw9; HlYg9: AtomicUtil::release($Mlv3V); goto DkZPO; DkZPO: } }