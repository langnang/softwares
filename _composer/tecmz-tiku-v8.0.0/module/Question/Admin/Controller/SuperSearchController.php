<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Admin\Controller; use ModStart\Core\Dao\ModelUtil; use ModStart\Core\Input\Response; use Module\Question\Util\SuperSearchUtil; use Module\Vendor\Provider\SuperSearch\Controller\AbstractAdminSuperSearchController; class SuperSearchController extends AbstractAdminSuperSearchController { public function index() { return $this->renderIndex(SuperSearchUtil::provider(), array('question_question')); } public function sync($qhOVL, $HaEPB, $qzh_v) { switch ($HaEPB) { case 'question_question': goto svUoH; V68bI: $GeXSC = array(); goto Jul9Y; db5AV: $GeXSC['nextId'] = $BEdDh['nextId']; goto RjqGC; svUoH: $BEdDh = ModelUtil::batch('question', $qzh_v, 1000); goto QmFfP; QmFfP: SuperSearchUtil::syncQuestions($BEdDh['records'], false); goto V68bI; RjqGC: return Response::generateSuccessData($GeXSC); goto CsKYi; Jul9Y: $GeXSC['count'] = count($BEdDh['records']); goto db5AV; CsKYi: } return Response::send(-1, '请求错误'); } }