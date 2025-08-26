<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Core; use ModStart\Core\Dao\ModelUtil; use Module\Question\Type\QuestionStatus; use Module\Vendor\Provider\SiteUrl\AbstractSiteUrlBiz; class QuestionSiteUrlBiz extends AbstractSiteUrlBiz { public function name() { return 'question'; } public function title() { return '题库'; } public function urlBuildBatch($qzh_v, $oG0tD = array()) { goto GcQUX; o3dby: return array('finish' => $SjUOk, 'records' => $v39Ud, 'nextId' => $OY0Gv['nextId']); goto u1983; GcQUX: $v39Ud = array(); goto ITjsM; FXkLa: $SjUOk = empty($OY0Gv['records']); goto W72JF; ITjsM: $OY0Gv = ModelUtil::batch('question', $qzh_v, 1000, array('parentId' => 0, 'status' => QuestionStatus::VERIFY_SUCCESS)); goto FXkLa; W72JF: foreach ($OY0Gv['records'] as $NZ_6d) { $v39Ud[] = array('url' => modstart_web_url('question/view/' . $NZ_6d['alias']), 'updateTime' => $NZ_6d['updated_at']); } goto o3dby; u1983: } }