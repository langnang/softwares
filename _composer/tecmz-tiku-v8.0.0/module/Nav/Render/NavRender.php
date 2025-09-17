<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Nav\Render; use Illuminate\Support\Facades\View; class NavRender { public static function position($OE9zh) { return View::make('module::Nav.View.inc.nav', array('position' => $OE9zh))->render(); } }