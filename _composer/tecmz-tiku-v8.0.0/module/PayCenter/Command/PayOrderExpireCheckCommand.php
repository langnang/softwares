<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\PayCenter\Command; use Carbon\Carbon; use Illuminate\Console\Command; use Illuminate\Support\Facades\Event; use ModStart\Core\Dao\ModelUtil; use ModStart\Core\Util\EventUtil; use Module\PayCenter\Events\OrderExpiredEvent; use Module\PayCenter\Type\PayOrderStatus; class PayOrderExpireCheckCommand extends Command { protected $signature = 'PayCenter:PayOrderExpireCheck'; public function handle() { $v39Ud = ModelUtil::model('pay_order')->where(array('status' => PayOrderStatus::NEW_ORDER))->where('created_at', '<', date('Y-m-d H:i:s', time() - 1800))->get()->toArray(); foreach ($v39Ud as $IfVKl) { goto RisyS; iok_n: EventUtil::fire($yY11E); goto KkA6D; suDiA: $yY11E = new OrderExpiredEvent(); goto FEY6z; pMzcM: $yY11E->bizId = $IfVKl['bizId']; goto NzysR; FEY6z: $yY11E->biz = $IfVKl['biz']; goto pMzcM; NzysR: $yY11E->order = $IfVKl; goto iok_n; RisyS: ModelUtil::update('pay_order', $IfVKl['id'], array('status' => PayOrderStatus::CLOSED_EXPIRED, 'timeClosed' => Carbon::now())); goto suDiA; KkA6D: } } }