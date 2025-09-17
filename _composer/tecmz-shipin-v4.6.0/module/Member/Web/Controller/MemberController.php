<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Web\Controller; use ModStart\Admin\Widget\DashboardItemA; use ModStart\App\Web\Layout\WebPage; use ModStart\Layout\Row; use ModStart\Widget\Box; use Module\Member\Config\MemberHomeIcon; use Module\Member\Support\MemberLoginCheck; class MemberController extends MemberFrameController implements MemberLoginCheck { public function index(WebPage $H1G2d) { goto liTqL; wBGS6: $H1G2d->view($M1iJt); goto CsA1f; M8v0v: $H1G2d->pageTitle('我的'); goto vg5lQ; vg5lQ: return $H1G2d; goto fT2YL; CsA1f: foreach (MemberHomeIcon::get() as $ik1Tw) { $H1G2d->append(Box::make(new Row(function (Row $vTw5z) use($ik1Tw) { foreach ($ik1Tw['children'] as $wkdWL) { $vTw5z->column(array('md' => 2, '' => 4), DashboardItemA::makeIconTitleLink($wkdWL['icon'], $wkdWL['title'], $wkdWL['url'])); } }), $ik1Tw['title'], 'transparent')); } goto M8v0v; liTqL: list($M1iJt, $MtwQ4) = $this->viewPaths('member.index'); goto wBGS6; fT2YL: } }