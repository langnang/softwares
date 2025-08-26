<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Exception\BizException; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; class MemberDocController extends Controller { public function get() { goto y4P1S; y4P1S: $bz1sB = InputPackage::buildFromInput(); goto IG_Hj; pbS3_: BizException::throwsIf('类型错误', !in_array($S3IJB, array('agreement', 'privacy'))); goto lGijN; IG_Hj: $S3IJB = $bz1sB->getTrimString('type'); goto pbS3_; lGijN: return Response::generateSuccessData(array('title' => modstart_config('Member_' . ucfirst($S3IJB) . 'Title'), 'content' => modstart_config('Member_' . ucfirst($S3IJB) . 'Content'))); goto QbCT9; QbCT9: } }