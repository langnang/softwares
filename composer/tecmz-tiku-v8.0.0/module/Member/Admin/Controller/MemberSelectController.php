<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Admin\Controller; use Illuminate\Routing\Controller; use ModStart\Admin\Concern\HasAdminQuickCRUD; use ModStart\Admin\Layout\AdminCRUDBuilder; use ModStart\Grid\GridFilter; use ModStart\Support\Concern\HasFields; class MemberSelectController extends Controller { use HasAdminQuickCRUD; protected function crud(AdminCRUDBuilder $cv5kq) { $cv5kq->init('member_user')->field(function ($cv5kq) { $cv5kq->id('id', 'ID'); $cv5kq->display('created_at', '创建时间'); $cv5kq->image('avatar', '头像'); $cv5kq->text('username', '用户名'); $cv5kq->text('email', '邮箱'); $cv5kq->text('phone', '手机'); })->gridFilter(function (GridFilter $qM7YH) { $qM7YH->eq('id', L('ID')); $qM7YH->like('username', '用户名'); $qM7YH->like('email', '邮箱'); $qM7YH->like('phone', '手机'); })->title('用户管理')->canDelete(false); } }