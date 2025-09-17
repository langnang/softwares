<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Widget\Field; use ModStart\Field\AbstractField; use ModStart\Field\Text; use ModStart\Field\Type\FieldRenderMode; use Module\Member\Util\MemberCmsUtil; class AdminMemberInfo extends Text { protected $view = 'modstart::core.field.text'; protected $editable = false; protected function setup() { parent::setup(); $this->addVariables(array('memberFieldName' => null)); } public function memberFieldName($NIxlc) { $this->addVariables(array('memberFieldName' => $NIxlc)); return $this; } public function renderView(AbstractField $QGYmu, $REa1I, $x1Lvn = 0) { switch ($QGYmu->renderMode()) { case FieldRenderMode::GRID: case FieldRenderMode::DETAIL: $this->hookRendering(function (AbstractField $QGYmu, $REa1I, $x1Lvn) { $FZI9y = $QGYmu->column(); return MemberCmsUtil::showFromId($REa1I->{$FZI9y}, $this->getVariable('memberFieldName')); }); } return parent::renderView($QGYmu, $REa1I, $x1Lvn); } }