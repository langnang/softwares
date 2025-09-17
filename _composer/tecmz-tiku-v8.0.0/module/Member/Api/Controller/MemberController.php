<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\Response; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; use Module\MemberCert\Util\MemberCertUtil; class MemberController extends Controller implements MemberLoginCheck { public function current() { goto z_5_O; oWZou: $GeXSC['_certType'] = null; goto r5w9s; r5w9s: if (modstart_module_enabled('MemberCert')) { $GeXSC['_certType'] = MemberCertUtil::getCertType(MemberUser::id()); } goto Fteue; Fteue: return Response::generateSuccessData($GeXSC); goto b9BmD; z_5_O: $GeXSC = array(); goto oWZou; b9BmD: } }