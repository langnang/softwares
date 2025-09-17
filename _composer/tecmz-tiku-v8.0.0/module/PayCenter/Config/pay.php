<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ return array('payOrderOutTradeNoPrefix' => config('env.PAY_CENTER_ORDER_PREFIX', 'mOrder'), 'payListener' => \Module\PayCenter\Listeners\PayListener::class);