<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelUtil; use Module\Banner\Type\BannerType; class ModifyBannerAddType extends Migration { public function up() { Schema::table('banner', function (Blueprint $G_sIl) { $G_sIl->tinyInteger('type')->nullable()->comment(''); if (!\ModStart\Core\Dao\ModelManageUtil::hasTableColumn('banner', 'title')) { $G_sIl->string('title', 100)->nullable()->comment(''); } $G_sIl->string('slogan', 200)->nullable()->comment(''); $G_sIl->string('linkText', 20)->nullable()->comment(''); $G_sIl->tinyInteger('colorReverse')->nullable()->comment(''); }); foreach (ModelUtil::all('banner') as $qlKQK) { ModelUtil::update('banner', $qlKQK['id'], array('type' => BannerType::IMAGE)); } } public function down() { } }