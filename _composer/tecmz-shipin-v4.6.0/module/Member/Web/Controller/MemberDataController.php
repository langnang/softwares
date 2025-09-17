<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Web\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\Request; use ModStart\Data\FileManager; use ModStart\Data\UeditorManager; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; class MemberDataController extends Controller implements MemberLoginCheck { public static $memberLoginCheckIgnores = array('ueditorGuest'); public function fileManager($Rup27) { if (Request::isPost()) { return FileManager::handle($Rup27, 'member_upload', 'member_upload_category', MemberUser::id()); } return view('module::Member.View.pc.memberData.fileManager', array('category' => $Rup27, 'pageTitle' => L('Select ' . ucfirst($Rup27)))); } public function ueditor() { return UeditorManager::handle('member_upload', 'member_upload_category', MemberUser::id()); } public function ueditorGuest() { return UeditorManager::handle('member_upload', 'member_upload_category', MemberUser::id()); } }