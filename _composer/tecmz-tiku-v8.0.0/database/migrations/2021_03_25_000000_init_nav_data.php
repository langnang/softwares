<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitNavData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Module\Nav\Util\NavUtil::add('header', '首页', '/');
        \Module\Nav\Util\NavUtil::add('header', '题目', '/question');
        \Module\Nav\Util\NavUtil::add('header', '试卷', '/paper');
        \Module\Nav\Util\NavUtil::add('header', '付费内容', '/vip_article');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
