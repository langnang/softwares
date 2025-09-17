<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto EzVZE; EzVZE: $router->match(array('get', 'post'), 'tecmz/upgrade', 'UpgradeController@index'); goto tvHNg; tvHNg: $router->match(array('get', 'post'), 'tecmz/upgrade/manual', 'UpgradeController@manual'); goto QgtCN; QgtCN: $router->match(array('get', 'post'), 'tecmz/upgrade/info', 'UpgradeController@info');