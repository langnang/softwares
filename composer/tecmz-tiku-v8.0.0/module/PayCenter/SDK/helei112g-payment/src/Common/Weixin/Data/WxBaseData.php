<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Weixin\Data; use Payment\Common\BaseData; abstract class WxBaseData extends BaseData { protected function makeSign($IRvxP) { switch ($this->signType) { case 'MD5': goto k9pDu; k9pDu: $IRvxP .= '&key=' . $this->md5Key; goto mrMgP; uHA81: break; goto TFGMl; mrMgP: $GtgYE = md5($IRvxP); goto uHA81; TFGMl: case 'HMAC-SHA256': $GtgYE = base64_encode(hash_hmac('sha256', $IRvxP, $this->md5Key)); break; default: $GtgYE = ''; } return strtoupper($GtgYE); } }