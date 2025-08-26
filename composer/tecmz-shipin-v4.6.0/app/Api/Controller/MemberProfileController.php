<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use ModStart\Core\Util\ArrayUtil; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; use Module\Member\Util\MemberUtil; class MemberProfileController extends Controller implements MemberLoginCheck { public function basic($Yvix_ = null) { goto cy9IB; kSZ73: MemberUtil::update(MemberUser::id(), ArrayUtil::keepKeys($Yvix_, array('gender', 'realname', 'signature'))); goto dOnJ_; dOnJ_: return Response::jsonSuccess('保存成功'); goto NSuhb; cy9IB: $wwevK = InputPackage::buildFromInput(); goto CycoV; CycoV: if (null === $Yvix_) { $Yvix_ = $wwevK->all(); } goto kSZ73; NSuhb: } }