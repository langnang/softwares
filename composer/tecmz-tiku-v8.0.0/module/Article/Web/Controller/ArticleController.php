<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Web\Controller; use ModStart\Core\Input\Response; use ModStart\Core\Util\ArrayUtil; use ModStart\Module\ModuleBaseController; use Module\Article\Util\ArticleUtil; class ArticleController extends ModuleBaseController { public function views($wa91I) { goto tVWA6; YESDm: return $this->view($Mi0Iq, array('article' => $cbVvx)); goto dB008; C6Oti: if ($cbVvx['position'] == 'page' || empty($cbVvx['position'])) { $Mi0Iq = 'article.viewPage'; } goto YESDm; CvKrI: if (empty($cbVvx)) { return Response::page404(); } goto rgkLb; rgkLb: $Mi0Iq = 'article.view'; goto C6Oti; tVWA6: if (is_numeric($wa91I)) { $cbVvx = ArticleUtil::get($wa91I); } else { $cbVvx = ArticleUtil::getByAlias($wa91I); } goto CvKrI; dB008: } }