<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Video\Admin\Controller; use Illuminate\Routing\Controller; use ModStart\Admin\Concern\HasAdminQuickCRUD; use ModStart\Admin\Layout\AdminCRUDBuilder; use ModStart\Form\Form; use ModStart\Grid\GridFilter; use ModStart\Support\Concern\HasFields; use Module\Video\Util\VideoCategoryUtil; class VideoCategoryController extends Controller { use HasAdminQuickCRUD; protected function crud(AdminCRUDBuilder $Jf1S7) { $Jf1S7->init('video_category')->field(function ($Jf1S7) { $Jf1S7->id('id', 'ID'); $Jf1S7->text('name', '名称'); $Jf1S7->image('cover', '封面'); $Jf1S7->display('created_at', L('Created At'))->listable(false); $Jf1S7->display('updated_at', L('Updated At'))->listable(false); })->gridFilter(function (GridFilter $XM5aD) { $XM5aD->eq('id', L('ID')); $XM5aD->like('name', L('Title')); })->hookChanged(function (Form $oqTbu) { VideoCategoryUtil::clearCache(); })->title('视频分类')->asTree('id', 'pid', 'sort', 'name')->treeMaxLevel(1); } }