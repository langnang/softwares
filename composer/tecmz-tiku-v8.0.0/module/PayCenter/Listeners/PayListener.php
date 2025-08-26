<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Listeners; use Illuminate\Support\Facades\Log; use Module\PayCenter\Biz\PayCenterBiz; use Module\PayCenter\Events\OrderExpiredEvent; use Module\PayCenter\Events\OrderPayedEvent; class PayListener { public function onOrderPayedEvent(OrderPayedEvent $yY11E) { Log::info('PayCenter.PayListener.onOrderPayedEvent - ' . json_encode($yY11E, JSON_UNESCAPED_UNICODE)); foreach (PayCenterBiz::all() as $qhOVL) { if ($yY11E->biz == $qhOVL->name()) { $qhOVL->onPayed($yY11E->bizId, $yY11E->order); } } } public function onOrderExpiredEvent(OrderExpiredEvent $yY11E) { Log::info('PayCenter.PayListener.onOrderExpiredEvent - ' . json_encode($yY11E, JSON_UNESCAPED_UNICODE)); foreach (PayCenterBiz::all() as $qhOVL) { if ($yY11E->biz == $qhOVL->name()) { $qhOVL->onExpired($yY11E->bizId, $yY11E->order); } } } public function subscribe($wkYBC) { $wkYBC->listen(OrderPayedEvent::class, '\\' . __CLASS__ . '@onOrderPayedEvent'); $wkYBC->listen(OrderExpiredEvent::class, '\\' . __CLASS__ . '@onOrderExpiredEvent'); } }