<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use Carbon\Carbon; use ModStart\Core\Dao\ModelUtil; class MemberMetaUtil { public static function set($MqkYF, $AfXAM, $WZC9G = null) { $LJw3u = array('memberUserId' => $MqkYF, 'name' => $AfXAM); if (is_null($WZC9G)) { ModelUtil::delete('member_meta', $LJw3u); } else { if (ModelUtil::update('member_meta', $LJw3u, array('value' => $WZC9G, 'updated_at' => Carbon::now())) <= 0) { goto Ajccb; ys_LQ: if (empty($AIK5r)) { ModelUtil::insert('member_meta', array_merge($LJw3u, array('value' => $WZC9G))); } goto Ckisk; Ajccb: ModelUtil::transactionBegin(); goto YIY7L; YIY7L: $AIK5r = ModelUtil::getWithLock('member_meta', $LJw3u); goto ys_LQ; Ckisk: ModelUtil::transactionCommit(); goto E1ohM; E1ohM: } } } public static function get($MqkYF, $AfXAM) { goto HGMRj; cSFxO: return null; goto Mqcwa; jer7s: $pWIpf = ModelUtil::get('member_meta', $LJw3u); goto s1NLu; s1NLu: if ($pWIpf) { return $pWIpf['value']; } goto cSFxO; HGMRj: $LJw3u = array('memberUserId' => $MqkYF, 'name' => $AfXAM); goto jer7s; Mqcwa: } }