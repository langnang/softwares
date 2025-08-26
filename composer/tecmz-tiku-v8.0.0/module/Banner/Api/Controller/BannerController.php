<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Banner\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use Module\Banner\Util\BannerUtil; class BannerController extends Controller { public function get() { goto InbJ7; Kj0B_: $x6JEB = BannerUtil::listByPositionWithCache($OE9zh); goto eWo7O; eWo7O: foreach ($x6JEB as $nJFbs => $NIxlc) { $x6JEB[$nJFbs]['image'] = AssetsUtil::fixFull($NIxlc['image']); } goto upBJt; upBJt: return Response::generateSuccessData($x6JEB); goto yOqZv; blRms: $OE9zh = $bz1sB->getTrimString('position'); goto Kj0B_; InbJ7: $bz1sB = InputPackage::buildFromInput(); goto blRms; yOqZv: } }