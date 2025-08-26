<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Web\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\Request; use ModStart\Data\FileManager; use ModStart\Data\UeditorManager; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; class MemberDataController extends Controller implements MemberLoginCheck { public static $memberLoginCheckIgnores = array('ueditorGuest'); public function fileManager($rP_uD) { if (Request::isPost()) { return FileManager::handle($rP_uD, 'member_upload', 'member_upload_category', MemberUser::id()); } return view('module::Member.View.pc.memberData.fileManager', array('category' => $rP_uD, 'pageTitle' => L('Select ' . ucfirst($rP_uD)))); } public function ueditor() { return UeditorManager::handle('member_upload', 'member_upload_category', MemberUser::id()); } public function ueditorGuest() { return UeditorManager::handle('member_upload', 'member_upload_category', MemberUser::id()); } }