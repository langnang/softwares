<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Tecmz\Traits; use ModStart\Admin\Layout\AdminPage; use ModStart\Admin\Widget\SecurityTooltipBox; use ModStart\Layout\Row; use Module\AdminManager\Widget\ServerInfoWidget; use Module\Tecmz\Widget\CopyrightWidget; use Module\Vendor\Admin\Config\AdminWidgetDashboard; trait AdminDashboardTrait { public function dashboard() { goto MUEdG; tBoch: return $gETpv; goto YCDY7; aTMDB: $gETpv->append(new CopyrightWidget()); goto q_d90; cSYFZ: $gETpv->pageTitle(L('Dashboard'))->row(new SecurityTooltipBox())->append(new Row(function (Row $ZUrcV) { AdminWidgetDashboard::callTodo($ZUrcV); }))->append(new Row(function (Row $ZUrcV) { AdminWidgetDashboard::callIcon($ZUrcV); })); goto hxOOB; q_d90: $gETpv->append(new ServerInfoWidget()); goto tBoch; hxOOB: AdminWidgetDashboard::call($gETpv); goto aTMDB; MUEdG: $gETpv = app(AdminPage::class); goto cSYFZ; YCDY7: } }