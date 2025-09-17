<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Api\Controller; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use ModStart\Module\ModuleBaseController; use Module\Article\Util\ArticleUtil; class ArticleController extends ModuleBaseController { public function get() { goto Qh1Hc; NyxO2: $wQ1uv = $nIp2z->getTrimString('id'); goto glAZt; Qh1Hc: $nIp2z = InputPackage::buildFromInput(); goto NyxO2; nQq0g: return Response::generateSuccessData(array('article' => $XEBGu)); goto b1RS4; glAZt: if (is_numeric($wQ1uv)) { $XEBGu = ArticleUtil::get($wQ1uv); } else { $XEBGu = ArticleUtil::getByAlias($wQ1uv); } goto nQq0g; b1RS4: } }