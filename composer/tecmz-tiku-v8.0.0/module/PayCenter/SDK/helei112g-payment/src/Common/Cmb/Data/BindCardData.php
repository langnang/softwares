<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Payment\Common\Cmb\Data; use Payment\Common\PayException; class BindCardData extends CmbBaseData { protected function checkDataParam() { goto gJDoM; gJDoM: parent::checkDataParam(); goto vHBJ3; vHBJ3: $Y33oC = $this->agr_no; goto aJwi3; aJwi3: if (empty($Y33oC) || mb_strlen($Y33oC) > 30 || !is_numeric($Y33oC)) { throw new PayException('客户协议号。必须为纯数字串，不超过30位'); } goto v44ZB; v44ZB: } protected function getReqData() { $sx3MN = array('dateTime' => $this->dateTime, 'merchantSerialNo' => $this->serial_no ? $this->serial_no : '', 'agrNo' => $this->agr_no, 'branchNo' => $this->branchNo, 'merchantNo' => $this->merchantNo, 'userID' => $this->user_id ? $this->user_id : '', 'mobile' => $this->mobile ? $this->mobile : '', 'lon' => $this->lon ? $this->lon : '', 'lat' => $this->lat ? $this->lat : '', 'riskLevel' => $this->risk_level ? $this->risk_level : '', 'noticeUrl' => $this->signNoticeUrl ? $this->signNoticeUrl : '', 'noticePara' => $this->return_param ? $this->return_param : '', 'returnUrl' => $this->returnUrl ? $this->returnUrl : ''); return $sx3MN; } }