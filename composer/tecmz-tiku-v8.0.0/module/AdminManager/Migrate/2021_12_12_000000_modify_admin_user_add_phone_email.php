<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; class ModifyAdminUserAddPhoneEmail extends Migration { public function up() { $VVBtn = config('modstart.admin.database.connection') ?: config('database.default'); Schema::connection($VVBtn)->table('admin_user', function (Blueprint $PpLvp) { $PpLvp->string('phone', 11)->comment('')->nullable(); $PpLvp->string('email', 100)->comment('')->nullable(); $PpLvp->unique('phone'); $PpLvp->unique('email'); }); } public function down() { } }