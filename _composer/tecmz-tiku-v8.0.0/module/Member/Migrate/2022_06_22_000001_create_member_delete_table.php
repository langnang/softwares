<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class CreateMemberDeleteTable extends Migration { public function up() { goto LcaWa; R0jQY: \ModStart\Core\Dao\ModelUtil::updateAll('member_user', array('isDeleted' => false)); goto LyLrW; LcaWa: Schema::table('member_user', function (Blueprint $PpLvp) { $PpLvp->bigInteger('deleteAtTime')->nullable()->comment('已删除'); $PpLvp->tinyInteger('isDeleted')->nullable()->comment('已删除'); $PpLvp->index(array('deleteAtTime')); }); goto T6_cU; T6_cU: Schema::create('member_deleted', function (Blueprint $PpLvp) { $PpLvp->increments('id'); $PpLvp->timestamps(); $PpLvp->string('username', 50)->nullable()->comment('用户名'); $PpLvp->string('phone', 20)->nullable()->comment('手机'); $PpLvp->string('email', 200)->nullable()->comment('邮箱'); $PpLvp->text('content')->comment('其他数据'); }); goto R0jQY; LyLrW: } public function down() { } }