<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use Module\Banner\Util\BannerUtil; class BannerController extends Controller { public function get() { goto O_M4c; Lt_Y2: foreach ($KgN71 as $hBBDL => $p4EDY) { $KgN71[$hBBDL]['image'] = AssetsUtil::fixFull($p4EDY['image']); } goto v6hmW; RH6Uo: $aWLu8 = $nIp2z->getTrimString('position'); goto xSDTo; v6hmW: return Response::generateSuccessData($KgN71); goto WAebl; xSDTo: $KgN71 = BannerUtil::listByPositionWithCache($aWLu8); goto Lt_Y2; O_M4c: $nIp2z = InputPackage::buildFromInput(); goto RH6Uo; WAebl: } }