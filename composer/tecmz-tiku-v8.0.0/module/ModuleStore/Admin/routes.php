<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ goto M4X2K; M4X2K: $router->match(array('get', 'post'), 'module_store', 'ModuleStoreController@index'); goto gg5IJ; ml_SQ: $router->match(array('post'), 'module_store/disable', 'ModuleStoreController@disable'); goto YdzY8; RKmd5: $router->match(array('post'), 'module_store/install', 'ModuleStoreController@install'); goto HZFT9; gg5IJ: $router->match(array('post'), 'module_store/all', 'ModuleStoreController@all'); goto RKmd5; YdzY8: $router->match(array('post'), 'module_store/upgrade', 'ModuleStoreController@upgrade'); goto w_7WZ; KoBMO: $router->match(array('post'), 'module_store/enable', 'ModuleStoreController@enable'); goto ml_SQ; HZFT9: $router->match(array('post'), 'module_store/uninstall', 'ModuleStoreController@uninstall'); goto KoBMO; w_7WZ: $router->match(array('get', 'post'), 'module_store/config/{module}', 'ModuleStoreController@config');