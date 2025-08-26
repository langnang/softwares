<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Video\Admin\Controller; use Illuminate\Routing\Controller; use ModStart\Admin\Layout\AdminConfigBuilder; use Module\Vendor\Html\HtmlType; class ConfigController extends Controller { public function setting(AdminConfigBuilder $Jf1S7) { goto JJzOI; UhO9F: return $Jf1S7->perform(); goto VUviI; FXoo_: $Jf1S7->formClass('wide-lg'); goto UhO9F; BWEVd: $Jf1S7->number('Video_ShowRatioPC', '播放器高度百分比（电脑端）')->help('默认56%，单位%，表示高度占宽度的比例，如50%表示 高度:宽度=1:2'); goto Z__20; Z__20: $Jf1S7->number('Video_ShowRatioMobile', '播放器高度百分比（手机端）')->help('默认56%，单位%，表示高度占宽度的比例，如50%表示 高度:宽度=1:2'); goto dMyOo; JJzOI: $Jf1S7->pageTitle('简单视频'); goto sQBx1; dMyOo: $Jf1S7->image('Video_VideoCoverDefault', '默认封面'); goto FXoo_; sQBx1: $Jf1S7->switch('Video_CommentEnable', '开启视频评论'); goto BWEVd; VUviI: } }