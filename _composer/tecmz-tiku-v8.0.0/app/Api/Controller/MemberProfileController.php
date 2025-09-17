<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use ModStart\Core\Util\ArrayUtil; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; use Module\Member\Util\MemberUtil; class MemberProfileController extends Controller implements MemberLoginCheck { public function basic($OxtWb = null) { goto Kxnrq; Kxnrq: $SWUP7 = InputPackage::buildFromInput(); goto h1sdx; XkMx7: MemberUtil::update(MemberUser::id(), ArrayUtil::keepKeys($OxtWb, array('gender', 'realname', 'signature'))); goto hz_2U; h1sdx: if (null === $OxtWb) { $OxtWb = $SWUP7->all(); } goto XkMx7; hz_2U: return Response::jsonSuccess('保存成功'); goto akC3Z; akC3Z: } }