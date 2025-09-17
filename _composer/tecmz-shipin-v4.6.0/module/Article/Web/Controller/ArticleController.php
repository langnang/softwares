<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Web\Controller; use ModStart\Core\Input\Response; use ModStart\Core\Util\ArrayUtil; use ModStart\Module\ModuleBaseController; use Module\Article\Util\ArticleUtil; class ArticleController extends ModuleBaseController { public function views($wQ1uv) { goto ktnx9; ZU9Gn: if (empty($XEBGu)) { return Response::page404(); } goto SEeMU; ktnx9: if (is_numeric($wQ1uv)) { $XEBGu = ArticleUtil::get($wQ1uv); } else { $XEBGu = ArticleUtil::getByAlias($wQ1uv); } goto ZU9Gn; SEeMU: $M1iJt = 'article.view'; goto wcysx; oBtM4: return $this->view($M1iJt, array('article' => $XEBGu)); goto TnM7z; wcysx: if ($XEBGu['position'] == 'page' || empty($XEBGu['position'])) { $M1iJt = 'article.viewPage'; } goto oBtM4; TnM7z: } }