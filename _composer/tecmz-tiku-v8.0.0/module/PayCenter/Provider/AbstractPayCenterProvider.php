<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Provider; use ModStart\Admin\Layout\AdminConfigBuilder; use ModStart\Core\Input\Response; abstract class AbstractPayCenterProvider { public abstract function name(); public abstract function title(); public abstract function enable(); public abstract function adminConfig(AdminConfigBuilder $cv5kq); public abstract function onSubmit($XdWpe, $l9M__, $InfBU = array()); public abstract function onNotify($l9M__, $bz1sB, $oG0tD = array()); public function onReturn($l9M__, $bz1sB, $oG0tD = array()) { return Response::redirect(modstart_web_url('')); } public function init() { } public function webRender($oG0tD) { return ''; } }