<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Web\Controller; use Module\Vendor\Installer\Util\InstallerUtil; use Module\Vendor\Provider\HomePage\HomePageProvider; use Module\Video\Provider\VideoHomePageProvider; class IndexController extends BaseController { public function index() { InstallerUtil::checkForInstallRedirect(); return HomePageProvider::call(__METHOD__, VideoHomePageProvider::ACTION); } }