<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Core; use Illuminate\Events\Dispatcher; use Illuminate\Support\Facades\Log; use Illuminate\Support\ServiceProvider; use ModStart\Admin\Config\AdminMenu; use ModStart\Module\ModuleClassLoader; class ModuleServiceProvider extends ServiceProvider { public function boot(Dispatcher $wkYBC) { if (method_exists(ModuleClassLoader::class, 'addClass')) { ModuleClassLoader::addClass('MPartner', __DIR__ . '/../Helpers/MPartner.php'); } AdminMenu::register(array(array('title' => '物料管理', 'icon' => 'description', 'sort' => 200, 'children' => array(array('title' => '友情链接', 'url' => '\\Module\\Partner\\Admin\\Controller\\PartnerController@index'))))); } public function register() { } }