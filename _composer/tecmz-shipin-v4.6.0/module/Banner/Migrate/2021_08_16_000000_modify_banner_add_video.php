<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelUtil; use Module\Banner\Type\BannerType; class ModifyBannerAddVideo extends Migration { public function up() { Schema::table('banner', function (Blueprint $G_sIl) { $G_sIl->string('video', 200)->nullable()->comment(''); }); } public function down() { } }