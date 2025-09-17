<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ $router->group(array('middleware' => array(\Module\Member\Middleware\WebAuthMiddleware::class)), function () use($router) { $router->match(array('get', 'post'), 'question', 'QuestionController@index'); $router->match(array('get', 'post'), 'question/view/{alias}', 'QuestionController@views')->where(array('alias' => '[a-z0-9]+')); $router->match(array('get', 'post'), 'question/answer/{alias}', 'QuestionController@answer')->where(array('alias' => '[a-z0-9]+')); $router->match(array('get', 'post'), 'question/search', 'QuestionController@search'); $router->match(array('get', 'post'), 'question/cat/{id}', 'QuestionCatController@index'); $router->match(array('get', 'post'), 'question/cat/{id}/list', 'QuestionCatController@lists'); });