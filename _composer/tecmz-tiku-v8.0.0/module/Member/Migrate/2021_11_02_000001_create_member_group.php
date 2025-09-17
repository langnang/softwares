<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberGroup extends Migration { public function up() { goto wy8u9; cVIj9: \ModStart\Core\Dao\ModelUtil::insertAll('member_group', array(array('title' => '普通用户', 'description' => '', 'isDefault' => true), array('title' => '高级用户', 'description' => '', 'isDefault' => false))); goto JoufW; Co6hR: Schema::table('member_user', function (Blueprint $PpLvp) { $PpLvp->integer('groupId')->nullable()->comment(''); }); goto cVIj9; wy8u9: Schema::create('member_group', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('title', 50)->nullable()->comment('名称'); $PpLvp->string('description', 200)->nullable()->comment('描述'); $PpLvp->tinyInteger('isDefault')->nullable()->comment('默认'); }); goto Co6hR; JoufW: } public function down() { } }