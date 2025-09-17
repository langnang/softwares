<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class ModifyAdminRoleAddRemark extends Migration { public function up() { $myX4G = config('modstart.admin.database.connection') ?: config('database.default'); Schema::connection($myX4G)->table('admin_role', function (Blueprint $G_sIl) { $G_sIl->string('remark', 400)->comment('')->nullable(); }); } public function down() { } }