<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberDeleteTable extends Migration { public function up() { goto b7cps; Es_2f: Schema::create('member_deleted', function (Blueprint $G_sIl) { $G_sIl->increments('id'); $G_sIl->timestamps(); $G_sIl->string('username', 50)->nullable()->comment('用户名'); $G_sIl->string('phone', 20)->nullable()->comment('手机'); $G_sIl->string('email', 200)->nullable()->comment('邮箱'); $G_sIl->text('content')->comment('其他数据'); }); goto wHM6I; wHM6I: \ModStart\Core\Dao\ModelUtil::updateAll('member_user', array('isDeleted' => false)); goto Tk20T; b7cps: Schema::table('member_user', function (Blueprint $G_sIl) { $G_sIl->bigInteger('deleteAtTime')->nullable()->comment('已删除'); $G_sIl->tinyInteger('isDeleted')->nullable()->comment('已删除'); $G_sIl->index(array('deleteAtTime')); }); goto Es_2f; Tk20T: } public function down() { } }