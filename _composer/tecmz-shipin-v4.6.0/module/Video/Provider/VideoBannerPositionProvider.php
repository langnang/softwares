<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Video\Provider; use Module\Banner\Provider\AbstractBannerPositionProvider; class VideoBannerPositionProvider extends AbstractBannerPositionProvider { const NAME = 'video'; public function name() { return self::NAME; } public function title() { return '简单视频首页'; } }