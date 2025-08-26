<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class ModifyQuestion20200514 extends Migration { public function up() { goto YLjQo; FAXYj: foreach (\ModStart\Core\Dao\ModelUtil::all('question', array(), array('id', 'question')) as $REa1I) { \ModStart\Core\Dao\ModelUtil::update('question', $REa1I['id'], array('questionText' => \ModStart\Core\Util\HtmlUtil::text($REa1I['question']))); } goto JX1NX; YLjQo: ini_set('memory_limit', '-1'); goto RzNOo; RzNOo: set_time_limit(0); goto niEad; niEad: Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->string('questionText', 2000)->nullable()->comment('问题（纯文本）'); }); goto FAXYj; JX1NX: } public function down() { } }