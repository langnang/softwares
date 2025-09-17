<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelUtil; class UpgradeAdminUploadCategoryId extends Migration { public function up() { ModelUtil::update('admin_upload', array('uploadCategoryId' => 0), array('uploadCategoryId' => -1)); } public function down() { } }