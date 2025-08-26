<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Type; use ModStart\Core\Type\BaseType; class QuestionType implements BaseType { const SINGLE_CHOICE = 1; const MULTI_CHOICES = 2; const TRUE_FALSE = 3; const FILL = 4; const TEXT = 5; const GROUP = 6; public static function getList() { return array(self::SINGLE_CHOICE => '单选题', self::MULTI_CHOICES => '多选题', self::TRUE_FALSE => '判断题', self::FILL => '填空题', self::TEXT => '问答题', self::GROUP => '组合题'); } public static function icon($S3IJB) { switch ($S3IJB) { case self::SINGLE_CHOICE: return 'iconfont icon-list-alt'; case self::MULTI_CHOICES: return 'iconfont icon-list-alt'; case self::TRUE_FALSE: return 'iconfont icon-clues'; case self::FILL: return 'iconfont icon-sign'; case self::TEXT: return 'iconfont icon-sign'; case self::GROUP: return 'iconfont icon-list-alt'; } return 'iconfont icon-home'; } }