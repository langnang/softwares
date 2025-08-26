<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto fn1Pm; sMwYu: $router->match(array('get'), 'banner/show', '\\Module\\Banner\\Admin\\Controller\\BannerController@show'); goto Eu1Tr; fn1Pm: $router->match(array('get', 'post'), 'banner', '\\Module\\Banner\\Admin\\Controller\\BannerController@index'); goto i19Z7; mG00D: $router->match(array('get', 'post'), 'banner/edit', '\\Module\\Banner\\Admin\\Controller\\BannerController@edit'); goto C6vPM; i19Z7: $router->match(array('get', 'post'), 'banner/add', '\\Module\\Banner\\Admin\\Controller\\BannerController@add'); goto mG00D; C6vPM: $router->match(array('post'), 'banner/delete', '\\Module\\Banner\\Admin\\Controller\\BannerController@delete'); goto sMwYu; Eu1Tr: $router->match(array('post'), 'banner/sort', '\\Module\\Banner\\Admin\\Controller\\BannerController@sort');