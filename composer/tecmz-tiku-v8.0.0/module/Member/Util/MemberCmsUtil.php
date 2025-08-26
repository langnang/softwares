<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Util; use ModStart\Core\Assets\AssetsUtil; use ModStart\Core\Dao\ModelUtil; use ModStart\Field\AutoRenderedFieldValue; class MemberCmsUtil { public static function showFromId($MqkYF, $QGYmu = null) { goto mBH7j; cWb_H: return self::show($w45m7, $QGYmu); goto CSEYe; S06t7: $w45m7 = ModelUtil::getWithCache('member_user', array('id' => $MqkYF)); goto cWb_H; mBH7j: if (!$MqkYF) { return AutoRenderedFieldValue::make('<span class="ub-text-muted">-</span>'); } goto S06t7; CSEYe: } public static function show($w45m7, $QGYmu = null) { if (!empty($w45m7)) { goto diWdA; Xv3V2: if ($w45m7['isDeleted']) { $eZv6D = '<已删除用户>'; } else { $eZv6D = '<未知用户>'; foreach ($QGYmu as $Elm_b) { if (!empty($w45m7[$Elm_b])) { $eZv6D = $w45m7[$Elm_b]; break; } } } goto VhXqN; AeCZW: if (!is_array($QGYmu)) { $QGYmu = array($QGYmu); } goto Xv3V2; diWdA: if (null === $QGYmu) { $QGYmu = array('username'); } goto AeCZW; VhXqN: return AutoRenderedFieldValue::make('<a href="javascript:;" class="ub-icon-text" data-dialog-request="' . action('\\Module\\Member\\Admin\\Controller\\MemberController@show', array('_id' => $w45m7['id'])) . '">
            <img class="icon" src="' . AssetsUtil::fixOrDefault($w45m7['avatar'], 'asset/image/avatar.svg') . '" />
            <span class="text">' . htmlspecialchars($eZv6D) . '</span></a>'); goto Yq5W0; Yq5W0: } return AutoRenderedFieldValue::make(''); } }