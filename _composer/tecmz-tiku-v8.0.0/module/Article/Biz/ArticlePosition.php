<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Biz; class ArticlePosition extends AbstractArticlePositionBiz { private $name; private $title; public static function make($AfXAM, $jTNJC) { goto M2ai7; O2QcZ: $AIK5r->name = $AfXAM; goto Q8S0g; M2ai7: $AIK5r = new static(); goto O2QcZ; MT7Bf: return $AIK5r; goto yOM1N; Q8S0g: $AIK5r->title = $jTNJC; goto MT7Bf; yOM1N: } public function name() { return $this->name; } public function title() { return $this->title; } }