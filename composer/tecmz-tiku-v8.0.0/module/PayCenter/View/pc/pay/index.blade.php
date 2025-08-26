@extends($_viewFrame)

@section('pageTitleMain')结算中心@endsection
@section('pageKeywords')结算中心@endsection
@section('pageDescription')结算中心@endsection

{!! \ModStart\ModStart::js('vendor/PayCenter/entry/pay.js') !!}
@section('bodyAppend')
    @parent
    <script>
        window.__pay = {
            device: '{{\ModStart\Core\Util\AgentUtil::device()}}'
        };
    </script>
@endsection

@section('bodyContent')

    <div class="ub-container" style="max-width:600px;">
        <div class="ub-text-center ub-text-bold tw-text-2xl tw-py-5 ub-text-default">
            <i class="iconfont icon-pay"></i>
            结算中心
        </div>
        <div class="ub-panel margin-top">
            <div class="head">
                <div class="title ub-text-muted">订单信息</div>
            </div>
            <div class="body">
                <div class="ub-pair">
                    <div class="name">结算单号</div>
                    <div class="value">{{$order['id']}}</div>
                </div>
                <div class="ub-pair">
                    <div class="name">内容</div>
                    <div class="value">{{$order['body']}}</div>
                </div>
                <div class="ub-pair">
                    <div class="name">金额</div>
                    <div class="value"><span class="ub-text-warning" style="font-size:1rem;">￥{{$order['feeTotal']}}</span></div>
                </div>
            </div>
        </div>
        @if($order['status']===\Module\PayCenter\Type\PayOrderStatus::PAYED)
            <div class="ub-alert ub-alert-success">
                当前订单已支付，正在跳转中...
            </div>
            <script>
                setTimeout(function(){
                    window.location.href = {!! json_encode($order['redirect']?$order['redirect']:modstart_web_url('')) !!};
                },2000);
            </script>
        @elseif($order['status']===\Module\PayCenter\Type\PayOrderStatus::CLOSED)
            <div class="ub-alert ub-alert-success">
                订单已关闭，正在跳转中...
            </div>
            <script>
                setTimeout(function(){
                    window.location.href = {!! json_encode($order['redirect']?$order['redirect']:modstart_web_url('')) !!};
                },2000);
            </script>
        @else
            <div class="ub-panel">
                <div class="head">
                    <div class="title ub-text-muted">点击支付</div>
                </div>
                <div class="body">
                    @if( \Module\PayCenter\Util\PayUtil::hasPay() )
                        <div class="ub-list-pay">
                            @if(!\ModStart\Core\Util\AgentUtil::isWechat() && \Module\PayCenter\Util\PayUtil::isAlipayEnable())
                                <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::ALIPAY?'active':''}}" href="javascript:;"
                                   data-type="{{\Module\PayCenter\Type\PayType::ALIPAY}}">
                                    <img class="icon" src="@asset('vendor/PayCenter/image/alipay.svg')"/>
                                    支付宝
                                </a>
                            @endif
                            @if(!\ModStart\Core\Util\AgentUtil::isWechat() && \Module\PayCenter\Util\PayUtil::isAlipayWebEnable() && !\ModStart\Core\Util\AgentUtil::isMobile())
                                <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::ALIPAY_WEB?'active':''}}" href="javascript:;"
                                   data-type="{{\Module\PayCenter\Type\PayType::ALIPAY_WEB}}">
                                    <img class="icon" src="@asset('vendor/PayCenter/image/alipay.svg')"/>
                                    支付宝电脑版
                                </a>
                            @endif
                            @if(!\ModStart\Core\Util\AgentUtil::isWechat() && \Module\PayCenter\Util\PayUtil::isAlipayWebEnable() && \ModStart\Core\Util\AgentUtil::isMobile())
                                <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::ALIPAY_MOBILE?'active':''}}" href="javascript:;"
                                   data-type="{{\Module\PayCenter\Type\PayType::ALIPAY_MOBILE}}">
                                    <img class="icon" src="@asset('vendor/PayCenter/image/alipay.svg')"/>
                                    支付宝手机版
                                </a>
                            @endif
                            @if(\Module\PayCenter\Util\PayUtil::isWechatEnable())
                                @if(\ModStart\Core\Util\AgentUtil::isMobile())
                                    @if(\ModStart\Core\Util\AgentUtil::isWechat())
                                        <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::WECHAT_MOBILE?'active':''}}" href="javascript:;"
                                           data-type="{{\Module\PayCenter\Type\PayType::WECHAT_MOBILE}}">
                                            <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                                            微信手机支付
                                        </a>
                                    @else
                                        <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::WECHAT_H5?'active':''}}" href="javascript:;"
                                           data-type="{{\Module\PayCenter\Type\PayType::WECHAT_H5}}">
                                            <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                                            微信H5支付
                                        </a>
                                    @endif
                                @else
                                    <a class="item {{$autoClickPayType==\Module\PayCenter\Type\PayType::WECHAT?'active':''}}" href="javascript:;"
                                       data-type="{{\Module\PayCenter\Type\PayType::WECHAT}}">
                                        <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                                        微信扫码支付
                                    </a>
                                @endif
                            @endif
                            @foreach(\Module\PayCenter\Provider\PayCenterProvider::all() as $provider)
                                @if($provider->enable())
                                    {!! $provider->webRender(['order'=>$order,'autoClickPayType'=>$autoClickPayType]) !!}
                                @endif
                            @endforeach
                            @if(\Module\PayCenter\Util\PayUtil::isMemberMoneyEnable())
                                <a class="item" href="javascript:;"
                                   data-type="{{\Module\PayCenter\Type\PayType::MEMBER_MONEY}}">
                                    @if(\Module\Member\Auth\MemberUser::isLogin())
                                        <div class="tw-float-right">
                                            我的余额 ￥{{\Module\Member\Util\MemberMoneyUtil::getTotal(\Module\Member\Auth\MemberUser::id())}}
                                        </div>
                                    @endif
                                    <img class="icon" src="@asset('vendor/PayCenter/image/money.svg')"/>
                                    余额支付
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="ub-alert ub-alert-danger">
                            未开通任何支付方式
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>

@endsection
