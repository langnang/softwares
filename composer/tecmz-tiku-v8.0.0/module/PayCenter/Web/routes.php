<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto hexnv; CNwmm: $router->match(array('get', 'post'), 'pay/notify/{payType}', 'NotifyController@index'); goto gmkWc; hexnv: $router->match(array('get', 'post'), 'pay/return/{payType}', 'ReturnController@index'); goto CNwmm; Q7D8s: if (class_exists('Module\\Member\\Middleware\\WebAuthMiddleware')) { $r3bGL[] = \Module\Member\Middleware\WebAuthMiddleware::class; } goto nhlOA; gmkWc: $r3bGL = array(); goto Q7D8s; nhlOA: $router->group(array('middleware' => $r3bGL), function () use($router) { $router->match(array('get', 'post'), 'pay', 'PayController@index'); $router->match(array('get', 'post'), 'pay/watch', 'PayController@watch'); });