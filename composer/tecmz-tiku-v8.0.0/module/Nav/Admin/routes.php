<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto swh0W; TwO6E: $router->match(array('post'), 'nav/delete', 'NavController@delete'); goto P4e4E; swh0W: $router->match(array('get', 'post'), 'nav', 'NavController@index'); goto Irh3D; Irh3D: $router->match(array('get', 'post'), 'nav/add', 'NavController@add'); goto Lk60j; P4e4E: $router->match(array('get'), 'nav/show', 'NavController@show'); goto vqjxO; Lk60j: $router->match(array('get', 'post'), 'nav/edit', 'NavController@edit'); goto TwO6E; vqjxO: $router->match(array('post'), 'nav/sort', 'NavController@sort');