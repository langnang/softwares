<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\AdminManager\Traits; use ModStart\Admin\Layout\AdminPage; use ModStart\Admin\Widget\SecurityTooltipBox; use ModStart\Layout\Row; use Module\AdminManager\Widget\ServerInfoWidget; use Module\Vendor\Admin\Config\AdminWidgetDashboard; trait AdminDashboardTrait { public function dashboard() { goto Zjk5r; Yr88K: $gETpv->append(new ServerInfoWidget()); goto YUjrK; oJBvq: AdminWidgetDashboard::call($gETpv); goto Yr88K; XFYlo: $gETpv->pageTitle(L('Dashboard'))->row(new SecurityTooltipBox())->append(new Row(function (Row $ZUrcV) { AdminWidgetDashboard::callIcon($ZUrcV); })); goto oJBvq; YUjrK: return $gETpv; goto usM0U; Zjk5r: $gETpv = app(AdminPage::class); goto XFYlo; usM0U: } }