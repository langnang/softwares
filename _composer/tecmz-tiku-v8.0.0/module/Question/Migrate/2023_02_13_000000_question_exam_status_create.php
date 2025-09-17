<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use ModStart\Core\Dao\ModelUtil; class QuestionExamStatusCreate extends Migration { public function up() { goto Khr4u; McHo6: Schema::table('question', function (Blueprint $PpLvp) { $PpLvp->integer('examPassCount')->nullable()->comment('')->default(0); $PpLvp->integer('examTotalCount')->nullable()->comment('')->default(0); }); goto MfMHW; Khr4u: Schema::create('question_exam_status', function (Blueprint $PpLvp) { $PpLvp->bigIncrements('id'); $PpLvp->timestamps(); $PpLvp->integer('questionId')->nullable()->comment('')->default(0); $PpLvp->integer('examId')->nullable()->comment('')->default(0); $PpLvp->tinyInteger('isJudge')->nullable()->comment('')->default(0); $PpLvp->tinyInteger('isCorrect')->nullable()->comment('')->default(0); $PpLvp->unique(array('questionId', 'examId')); }); goto McHo6; MfMHW: ModelUtil::updateAll('question', array('examPassCount' => 0, 'examTotalCount' => 0)); goto yGWnQ; yGWnQ: } public function down() { } }