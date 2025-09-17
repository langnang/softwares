<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Dao\ModelUtil; use ModStart\Field\AutoRenderedFieldValue; class MemberCmsUtil { public static function showFromId($XK7hT, $gxoEj = null) { goto nON1L; nON1L: if (!$XK7hT) { return AutoRenderedFieldValue::make('<span class="ub-text-muted">-</span>'); } goto wEzLJ; wEzLJ: $OYXQL = ModelUtil::getWithCache('member_user', array('id' => $XK7hT)); goto Z1na7; Z1na7: return self::show($OYXQL, $gxoEj); goto ujNvG; ujNvG: } public static function show($OYXQL, $gxoEj = null) { if (!empty($OYXQL)) { goto RUM9e; Lj2LC: if ($OYXQL['isDeleted']) { $ikmC5 = '<已删除用户>'; } else { $ikmC5 = '<未知用户>'; foreach ($gxoEj as $b8b8j) { if (!empty($OYXQL[$b8b8j])) { $ikmC5 = $OYXQL[$b8b8j]; break; } } } goto AwQWX; RUM9e: if (null === $gxoEj) { $gxoEj = array('username'); } goto gu1d0; gu1d0: if (!is_array($gxoEj)) { $gxoEj = array($gxoEj); } goto Lj2LC; AwQWX: return AutoRenderedFieldValue::make('<a href="javascript:;" class="ub-icon-text" data-dialog-request="' . action('\\Module\\Member\\Admin\\Controller\\MemberController@show', array('_id' => $OYXQL['id'])) . '">
            <img class="icon" src="' . AssetsUtil::fixOrDefault($OYXQL['avatar'], 'asset/image/avatar.png') . '" />
            <span class="text">' . htmlspecialchars($ikmC5) . '</span></a>'); goto K9NUK; K9NUK: } return AutoRenderedFieldValue::make(''); } }