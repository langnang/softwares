<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto A_np1; oCLC3: $router->match(array('get', 'post'), 'partner/add', 'PartnerController@add'); goto jfzAz; A_np1: $router->match(array('get', 'post'), 'partner', 'PartnerController@index'); goto oCLC3; kHPQj: $router->match(array('get'), 'partner/show', 'PartnerController@show'); goto A97Cy; A97Cy: $router->match(array('post'), 'partner/sort', 'PartnerController@sort'); goto ljMn_; snXT4: $router->match(array('post'), 'partner/delete', 'PartnerController@delete'); goto kHPQj; jfzAz: $router->match(array('get', 'post'), 'partner/edit', 'PartnerController@edit'); goto snXT4; ljMn_: $router->match(array('get', 'post'), 'partner/config', 'PartnerController@config');