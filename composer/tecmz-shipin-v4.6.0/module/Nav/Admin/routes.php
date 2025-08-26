<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto oqZMX; Y1ehp: $router->match(array('get', 'post'), 'nav/edit', 'NavController@edit'); goto jfTM1; RKRKg: $router->match(array('get', 'post'), 'nav/add', 'NavController@add'); goto Y1ehp; hwm93: $router->match(array('get'), 'nav/show', 'NavController@show'); goto jY6L4; jfTM1: $router->match(array('post'), 'nav/delete', 'NavController@delete'); goto hwm93; oqZMX: $router->match(array('get', 'post'), 'nav', 'NavController@index'); goto RKRKg; jY6L4: $router->match(array('post'), 'nav/sort', 'NavController@sort');