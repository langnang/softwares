<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Input\Response; use Module\Question\Util\QuestionTagUtil; class QuestionTagController extends Controller { public function all() { return Response::generateSuccessData(QuestionTagUtil::all()); } }