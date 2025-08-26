<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Widget\Field; use ModStart\Field\AbstractField; use ModStart\Field\Text; use ModStart\Field\Type\FieldRenderMode; use Module\Member\Util\MemberCmsUtil; class AdminMemberInfo extends Text { protected $view = 'modstart::core.field.text'; protected $editable = false; protected function setup() { parent::setup(); $this->addVariables(array('memberFieldName' => null)); } public function memberFieldName($p4EDY) { $this->addVariables(array('memberFieldName' => $p4EDY)); return $this; } public function renderView(AbstractField $gxoEj, $qlKQK, $mlRDG = 0) { switch ($gxoEj->renderMode()) { case FieldRenderMode::GRID: case FieldRenderMode::DETAIL: $this->hookRendering(function (AbstractField $gxoEj, $qlKQK, $mlRDG) { $h3he_ = $gxoEj->column(); return MemberCmsUtil::showFromId($qlKQK->{$h3he_}, $this->getVariable('memberFieldName')); }); } return parent::renderView($gxoEj, $qlKQK, $mlRDG); } }