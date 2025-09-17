<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use Carbon\Carbon; use ModStart\Core\Dao\ModelUtil; class MemberMetaUtil { public static function set($XK7hT, $FPiC8, $I1R2f = null) { $pwUw2 = array('memberUserId' => $XK7hT, 'name' => $FPiC8); if (is_null($I1R2f)) { ModelUtil::delete('member_meta', $pwUw2); } else { if (ModelUtil::update('member_meta', $pwUw2, array('value' => $I1R2f, 'updated_at' => Carbon::now())) <= 0) { goto jdC8m; Nnurj: if (empty($MY20n)) { ModelUtil::insert('member_meta', array_merge($pwUw2, array('value' => $I1R2f))); } goto CFByV; uIJrC: $MY20n = ModelUtil::getWithLock('member_meta', $pwUw2); goto Nnurj; jdC8m: ModelUtil::transactionBegin(); goto uIJrC; CFByV: ModelUtil::transactionCommit(); goto yAmxU; yAmxU: } } } public static function get($XK7hT, $FPiC8) { goto kNxSB; jCXDn: if ($mRJAl) { return $mRJAl['value']; } goto qILic; qILic: return null; goto FFH26; M80ur: $mRJAl = ModelUtil::get('member_meta', $pwUw2); goto jCXDn; kNxSB: $pwUw2 = array('memberUserId' => $XK7hT, 'name' => $FPiC8); goto M80ur; FFH26: } }