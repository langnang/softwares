<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common; interface BaseStrategy { public function handle(array $GeXSC); public function getBuildDataClass(); }