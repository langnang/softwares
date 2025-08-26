<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Util; use Illuminate\Support\Facades\DB; use ModStart\Core\Dao\ModelUtil; class QuestionExamStatusUtil { public static function push($WuEXg, $MKSoj, $rE9KL, $JPVyx) { goto VID0k; oR0Qq: if ($rE9KL) { goto TFkKJ; o8nED: $i6l68['examTotalCount'] = DB::raw('IFNULL(examTotalCount,0) + 1'); goto esgdH; gEMrR: ModelUtil::update('question', $WuEXg, $i6l68); goto OtsQ7; esgdH: if ($JPVyx) { $i6l68['examPassCount'] = DB::raw('IFNULL(examPassCount,0) + 1'); } goto gEMrR; TFkKJ: $i6l68 = array(); goto o8nED; OtsQ7: } goto qmlzq; DgPMY: $M6ZFe = ModelUtil::get('question_exam_status', $LJw3u); goto mD5ta; mD5ta: if ($M6ZFe) { if ($M6ZFe['isJudge']) { return; } ModelUtil::update('question_exam_status', $LJw3u, $tcTgP); } else { $tcTgP = array_merge($LJw3u, $tcTgP); ModelUtil::insert('question_exam_status', $tcTgP); } goto oR0Qq; kzXuA: $tcTgP = array('isJudge' => $rE9KL, 'isCorrect' => $JPVyx); goto DgPMY; VID0k: $LJw3u = array('questionId' => $WuEXg, 'examId' => $MKSoj); goto kzXuA; qmlzq: } }