<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\AdminManager\Traits; use ModStart\Admin\Layout\AdminPage; use ModStart\Admin\Widget\SecurityTooltipBox; use ModStart\Layout\Row; use Module\AdminManager\Widget\ServerInfoWidget; use Module\Vendor\Admin\Config\AdminWidgetDashboard; trait AdminDashboardTrait { public function dashboard() { goto SOLMm; SOLMm: $H1G2d = app(AdminPage::class); goto wKP1D; wKP1D: $H1G2d->pageTitle(L('Dashboard'))->row(new SecurityTooltipBox())->append(new Row(function (Row $vTw5z) { AdminWidgetDashboard::callIcon($vTw5z); })); goto mbn7u; mbn7u: AdminWidgetDashboard::call($H1G2d); goto Lw0VS; LSYEo: return $H1G2d; goto yv3af; Lw0VS: $H1G2d->append(new ServerInfoWidget()); goto LSYEo; yv3af: } }