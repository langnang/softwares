<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; use ModStart\Core\Dao\ModelManageUtil; class CreateBanner extends Migration { public function up() { if (ModelManageUtil::hasTable('banner')) { goto e6f7Z; r4iOq: if (!in_array('position', $Ij1fV)) { Schema::table('banner', function (Blueprint $PpLvp) { $PpLvp->string('position', 50)->nullable()->comment('位置'); }); } goto PAnc7; PAnc7: if (!in_array('sort', $Ij1fV)) { Schema::table('banner', function (Blueprint $PpLvp) { $PpLvp->integer('sort')->nullable()->comment('顺序'); }); } goto a0TWG; e6f7Z: $Ij1fV = ModelManageUtil::listTableColumns('banner'); goto r4iOq; a0TWG: } else { Schema::create('banner', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('position', 50)->nullable()->comment('位置'); $PpLvp->integer('sort')->nullable()->comment('顺序'); $PpLvp->string('image', 100)->nullable()->comment('图片'); $PpLvp->string('link', 200)->nullable()->comment('链接'); }); } } public function down() { } }