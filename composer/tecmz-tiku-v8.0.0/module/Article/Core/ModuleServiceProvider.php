<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Article\Core; use Illuminate\Events\Dispatcher; use Illuminate\Support\ServiceProvider; use ModStart\Admin\Config\AdminMenu; use ModStart\Core\Dao\ModelUtil; use Module\Vendor\Admin\Config\AdminWidgetLink; class ModuleServiceProvider extends ServiceProvider { public function boot(Dispatcher $wkYBC) { AdminMenu::register(array(array('title' => '物料管理', 'icon' => 'description', 'sort' => 200, 'children' => array(array('title' => '通用文章', 'url' => '\\Module\\Article\\Admin\\Controller\\ArticleController@index'))))); AdminWidgetLink::register(function () { return AdminWidgetLink::build('通用文章', array_map(function ($NZ_6d) { return array($NZ_6d['title'], modstart_web_url($NZ_6d['alias'] ? "article/{$NZ_6d['alias']}" : "article/{$NZ_6d['id']}")); }, ModelUtil::all('article'))); }); } public function register() { } }