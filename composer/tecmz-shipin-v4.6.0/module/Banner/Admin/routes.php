<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto z1C3s; JbU1j: $router->match(array('get'), 'banner/show', '\\Module\\Banner\\Admin\\Controller\\BannerController@show'); goto u3HHg; wpgu1: $router->match(array('get', 'post'), 'banner/edit', '\\Module\\Banner\\Admin\\Controller\\BannerController@edit'); goto r0046; r0046: $router->match(array('post'), 'banner/delete', '\\Module\\Banner\\Admin\\Controller\\BannerController@delete'); goto JbU1j; z1C3s: $router->match(array('get', 'post'), 'banner', '\\Module\\Banner\\Admin\\Controller\\BannerController@index'); goto ZAoDU; ZAoDU: $router->match(array('get', 'post'), 'banner/add', '\\Module\\Banner\\Admin\\Controller\\BannerController@add'); goto wpgu1; u3HHg: $router->match(array('post'), 'banner/sort', '\\Module\\Banner\\Admin\\Controller\\BannerController@sort');