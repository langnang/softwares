<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Provider\MemberAdminShowPanel; use Illuminate\Support\Facades\View; abstract class AbstractMemberAdminShowPanelProvider { public abstract function name(); public abstract function title(); public function renderView() { return null; } public function render($OYXQL, $EeGOj = array()) { return View::make($this->renderView(), array('memberUser' => $OYXQL, 'param' => $EeGOj))->render(); } }