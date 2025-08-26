<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelUtil; use Module\Banner\Type\BannerType; class ModifyBannerAddType extends Migration { public function up() { Schema::table('banner', function (Blueprint $PpLvp) { $PpLvp->tinyInteger('type')->nullable()->comment(''); if (!\ModStart\Core\Dao\ModelManageUtil::hasTableColumn('banner', 'title')) { $PpLvp->string('title', 100)->nullable()->comment(''); } $PpLvp->string('slogan', 200)->nullable()->comment(''); $PpLvp->string('linkText', 20)->nullable()->comment(''); $PpLvp->tinyInteger('colorReverse')->nullable()->comment(''); }); foreach (ModelUtil::all('banner') as $REa1I) { ModelUtil::update('banner', $REa1I['id'], array('type' => BannerType::IMAGE)); } } public function down() { } }