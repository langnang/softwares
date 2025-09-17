<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto LeHMD; H9vVx: $router->match(array('get', 'post'), 'pay/notify/{payType}', '\\Module\\PayCenter\\Web\\Controller\\NotifyController@index'); goto OiKC8; LeHMD: $router->match(array('get', 'post'), 'pay/return/{payType}', '\\Module\\PayCenter\\Web\\Controller\\ReturnController@index'); goto H9vVx; OiKC8: $router->group(array('middleware' => array()), function () use($router) { $router->match(array('post'), 'pay/config', 'PayController@config'); $router->match(array('post'), 'pay/info', 'PayController@info'); $router->match(array('post'), 'pay/submit', 'PayController@submit'); });