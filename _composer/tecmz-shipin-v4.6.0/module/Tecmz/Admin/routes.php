<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto hQVVj; hQVVj: $router->match(array('get', 'post'), 'tecmz/upgrade', 'UpgradeController@index'); goto PNXAp; PNXAp: $router->match(array('get', 'post'), 'tecmz/upgrade/manual', 'UpgradeController@manual'); goto VxSJ6; VxSJ6: $router->match(array('get', 'post'), 'tecmz/upgrade/info', 'UpgradeController@info');