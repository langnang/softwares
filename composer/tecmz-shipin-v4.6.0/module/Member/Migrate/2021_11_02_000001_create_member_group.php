<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateMemberGroup extends Migration { public function up() { goto uAcpk; CRGSH: \ModStart\Core\Dao\ModelUtil::insertAll('member_group', array(array('title' => '普通用户', 'description' => '', 'isDefault' => true), array('title' => '高级用户', 'description' => '', 'isDefault' => false))); goto W1j6r; coFQu: Schema::table('member_user', function (Blueprint $G_sIl) { $G_sIl->integer('groupId')->nullable()->comment(''); }); goto CRGSH; uAcpk: Schema::create('member_group', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->string('title', 50)->nullable()->comment('名称'); $G_sIl->string('description', 200)->nullable()->comment('描述'); $G_sIl->tinyInteger('isDefault')->nullable()->comment('默认'); }); goto coFQu; W1j6r: } public function down() { } }