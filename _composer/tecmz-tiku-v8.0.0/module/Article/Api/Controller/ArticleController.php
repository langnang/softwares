<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Api\Controller; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use ModStart\Module\ModuleBaseController; use Module\Article\Util\ArticleUtil; class ArticleController extends ModuleBaseController { public function get() { goto EalZT; INAu1: $wa91I = $bz1sB->getTrimString('id'); goto esoHi; C0e1g: return Response::generateSuccessData(array('article' => $cbVvx)); goto Jm8Ka; EalZT: $bz1sB = InputPackage::buildFromInput(); goto INAu1; esoHi: if (is_numeric($wa91I)) { $cbVvx = ArticleUtil::get($wa91I); } else { $cbVvx = ArticleUtil::getByAlias($wa91I); } goto C0e1g; Jm8Ka: } }