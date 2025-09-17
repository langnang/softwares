<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateVideoCategory extends Migration { public function up() { Schema::create('video_category', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->integer('pid')->comment('父ID')->nullable(); $G_sIl->integer('sort')->comment('排序，越小越靠前')->nullable(); $G_sIl->string('name', 20)->nullable()->comment('名称'); $G_sIl->string('cover', 200)->nullable()->comment('名称'); }); } public function down() { } }