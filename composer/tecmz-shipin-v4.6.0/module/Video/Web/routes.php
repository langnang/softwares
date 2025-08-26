<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto XsZpW; eWjG0: $router->match(array('get', 'post'), 'video/{id}', 'VideoController@views'); goto T0E6I; XsZpW: $router->match(array('get', 'post'), 'video', 'VideoController@index'); goto eWjG0; T0E6I: $router->match(array('get', 'post'), 'video/search', 'VideoController@search');