<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ $router->group(array('middleware' => array(\Module\Member\Middleware\ApiAuthMiddleware::class)), function () use($router) { $router->match(array('get', 'post'), 'question/cat_list', 'QuestionController@catList'); $router->match(array('get', 'post'), 'question/cat_or_default', 'QuestionController@catOrDefault'); $router->match(array('get', 'post'), 'question/list', 'QuestionController@lists'); $router->match(array('get', 'post'), 'question/search', 'QuestionController@lists'); $router->match(array('get', 'post'), 'question/search_ocr', 'QuestionController@searchOcr'); $router->match(array('get', 'post'), 'question/get', 'QuestionController@get'); $router->match(array('get', 'post'), 'question/answer', 'QuestionController@answer'); });