<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Exception\BizException; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; class MemberDocController extends Controller { public function get() { goto Gqi9Y; HGH1a: $FmHYg = $nIp2z->getTrimString('type'); goto BEx53; BEx53: BizException::throwsIf('类型错误', !in_array($FmHYg, array('agreement', 'privacy'))); goto j2g2p; Gqi9Y: $nIp2z = InputPackage::buildFromInput(); goto HGH1a; j2g2p: return Response::generateSuccessData(array('title' => modstart_config('Member_' . ucfirst($FmHYg) . 'Title'), 'content' => modstart_config('Member_' . ucfirst($FmHYg) . 'Content'))); goto uBNH6; uBNH6: } }