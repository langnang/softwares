<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Tecmz\Traits; use ModStart\Admin\Layout\AdminPage; use ModStart\Admin\Widget\SecurityTooltipBox; use ModStart\Layout\Row; use Module\AdminManager\Widget\ServerInfoWidget; use Module\Tecmz\Widget\CopyrightWidget; use Module\Vendor\Admin\Config\AdminWidgetDashboard; trait AdminDashboardTrait { public function dashboard() { goto TP48D; hpWes: AdminWidgetDashboard::call($H1G2d); goto ZV8MC; ZV8MC: $H1G2d->append(new CopyrightWidget()); goto XSMW1; MGgnJ: return $H1G2d; goto aw9zG; TP48D: $H1G2d = app(AdminPage::class); goto t3eP7; t3eP7: $H1G2d->pageTitle(L('Dashboard'))->row(new SecurityTooltipBox())->append(new Row(function (Row $vTw5z) { AdminWidgetDashboard::callTodo($vTw5z); }))->append(new Row(function (Row $vTw5z) { AdminWidgetDashboard::callIcon($vTw5z); })); goto hpWes; XSMW1: $H1G2d->append(new ServerInfoWidget()); goto MGgnJ; aw9zG: } }