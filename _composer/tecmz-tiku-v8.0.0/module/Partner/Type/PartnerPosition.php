<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Partner\Type; use ModStart\Core\Type\BaseType; use ModStart\Module\ModuleManager; use Module\Partner\Biz\PartnerPositionBiz; use Module\Partner\Provider\PartnerPositionProvider; class PartnerPosition implements BaseType { public static function getList() { return array_merge(ModuleManager::getModuleConfigKeyValueItems('Partner', 'position'), PartnerPositionProvider::allMap(), PartnerPositionBiz::allMap()); } }