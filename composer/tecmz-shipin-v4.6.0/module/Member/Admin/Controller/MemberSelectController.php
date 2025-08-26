<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Admin\Controller; use Illuminate\Routing\Controller; use ModStart\Admin\Concern\HasAdminQuickCRUD; use ModStart\Admin\Layout\AdminCRUDBuilder; use ModStart\Grid\GridFilter; use ModStart\Support\Concern\HasFields; class MemberSelectController extends Controller { use HasAdminQuickCRUD; protected function crud(AdminCRUDBuilder $Jf1S7) { $Jf1S7->init('member_user')->field(function ($Jf1S7) { $Jf1S7->id('id', 'ID'); $Jf1S7->display('created_at', '创建时间'); $Jf1S7->image('avatar', '头像'); $Jf1S7->text('username', '用户名'); $Jf1S7->text('email', '邮箱'); $Jf1S7->text('phone', '手机'); })->gridFilter(function (GridFilter $XM5aD) { $XM5aD->eq('id', L('ID')); $XM5aD->like('username', '用户名'); $XM5aD->like('email', '邮箱'); $XM5aD->like('phone', '手机'); })->title('用户管理')->canDelete(false); } }