<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto K9Joi; K9Joi: $router->match(array('get', 'post'), 'article', 'ArticleController@index'); goto HbXnk; iyNzp: $router->match(array('get', 'post'), 'article/edit', 'ArticleController@edit'); goto MVNCs; MVNCs: $router->match(array('post'), 'article/delete', 'ArticleController@delete'); goto OI6cY; HbXnk: $router->match(array('get', 'post'), 'article/add', 'ArticleController@add'); goto iyNzp; OI6cY: $router->match(array('get'), 'article/show', 'ArticleController@show');