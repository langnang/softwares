<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelManageUtil; class CreateBanner extends Migration { public function up() { if (ModelManageUtil::hasTable('banner')) { goto tXoej; tXoej: $czV7K = ModelManageUtil::listTableColumns('banner'); goto w49H6; w49H6: if (!in_array('position', $czV7K)) { Schema::table('banner', function (Blueprint $G_sIl) { $G_sIl->string('position', 50)->nullable()->comment('位置'); }); } goto Ua_aJ; Ua_aJ: if (!in_array('sort', $czV7K)) { Schema::table('banner', function (Blueprint $G_sIl) { $G_sIl->integer('sort')->nullable()->comment('顺序'); }); } goto qEnEy; qEnEy: } else { Schema::create('banner', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->string('position', 50)->nullable()->comment('位置'); $G_sIl->integer('sort')->nullable()->comment('顺序'); $G_sIl->string('image', 100)->nullable()->comment('图片'); $G_sIl->string('link', 200)->nullable()->comment('链接'); }); } } public function down() { } }