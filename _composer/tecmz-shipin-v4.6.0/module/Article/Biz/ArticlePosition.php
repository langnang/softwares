<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Biz; class ArticlePosition extends AbstractArticlePositionBiz { private $name; private $title; public static function make($FPiC8, $gbyXi) { goto Z3KMJ; NusnE: $MY20n->name = $FPiC8; goto pQeFX; XATGe: return $MY20n; goto dfSmo; Z3KMJ: $MY20n = new static(); goto NusnE; pQeFX: $MY20n->title = $gbyXi; goto XATGe; dfSmo: } public function name() { return $this->name; } public function title() { return $this->title; } }