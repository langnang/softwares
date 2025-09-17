<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Http; use Illuminate\Foundation\Http\Kernel as HttpKernel; class Kernel extends HttpKernel { protected $middleware = array(\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class, \Illuminate\Cookie\Middleware\EncryptCookies::class, \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, \Illuminate\Session\Middleware\StartSession::class); protected $routeMiddleware = array(); }