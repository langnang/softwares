<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Type; use ModStart\Core\Type\BaseType; class QuestionStatus implements BaseType { const VERIFYING = 1; const VERIFY_FAIL = 2; const VERIFY_SUCCESS = 3; public static function getList() { return array(self::VERIFYING => '审核中', self::VERIFY_FAIL => '审核失败', self::VERIFY_SUCCESS => '审核成功'); } }