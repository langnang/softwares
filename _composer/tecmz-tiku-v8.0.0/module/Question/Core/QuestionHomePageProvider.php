<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Question\Core; use Module\Vendor\Provider\HomePage\AbstractHomePageProvider; class QuestionHomePageProvider extends AbstractHomePageProvider { const ACTION = '\\Module\\Question\\Web\\Controller\\QuestionController@index'; public function title() { return '题库'; } public function action() { return self::ACTION; } }