<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto hxrk_; vKWcP: $router->match(array('get', 'post'), 'article/edit', 'ArticleController@edit'); goto B4WQN; hxrk_: $router->match(array('get', 'post'), 'article', 'ArticleController@index'); goto HkbHq; HkbHq: $router->match(array('get', 'post'), 'article/add', 'ArticleController@add'); goto vKWcP; B4WQN: $router->match(array('post'), 'article/delete', 'ArticleController@delete'); goto PHLUO; PHLUO: $router->match(array('get'), 'article/show', 'ArticleController@show');