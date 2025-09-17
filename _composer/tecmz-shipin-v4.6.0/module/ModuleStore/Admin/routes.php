<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto VcELn; R6k3j: $router->match(array('post'), 'module_store/uninstall', 'ModuleStoreController@uninstall'); goto T49bi; T49bi: $router->match(array('post'), 'module_store/enable', 'ModuleStoreController@enable'); goto mqdrA; mqdrA: $router->match(array('post'), 'module_store/disable', 'ModuleStoreController@disable'); goto Aslik; VcELn: $router->match(array('get', 'post'), 'module_store', 'ModuleStoreController@index'); goto s4Ywr; APt8c: $router->match(array('post'), 'module_store/install', 'ModuleStoreController@install'); goto R6k3j; s4Ywr: $router->match(array('post'), 'module_store/all', 'ModuleStoreController@all'); goto APt8c; Aslik: $router->match(array('post'), 'module_store/upgrade', 'ModuleStoreController@upgrade'); goto t4blf; t4blf: $router->match(array('get', 'post'), 'module_store/config/{module}', 'ModuleStoreController@config');