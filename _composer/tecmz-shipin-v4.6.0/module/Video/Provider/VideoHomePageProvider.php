<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Video\Provider; use Module\Vendor\Provider\HomePage\AbstractHomePageProvider; class VideoHomePageProvider extends AbstractHomePageProvider { const ACTION = '\\Module\\Video\\Web\\Controller\\VideoController@home'; public function title() { return '视频'; } public function action() { return self::ACTION; } }