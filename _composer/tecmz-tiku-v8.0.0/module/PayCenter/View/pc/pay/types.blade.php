@if( \Module\PayCenter\Util\PayUtil::hasPay() )
    <div class="ub-list-pay disabled inlined">
        <div class="ub-text-muted tw-mb-4">
            支持的支付方式
        </div>
        @if(\Module\PayCenter\Util\PayUtil::isAlipayEnable())
            <a class="item" href="javascript:;"
               data-type="{{\Module\PayCenter\Type\PayType::ALIPAY}}">
                <img class="icon" src="@asset('vendor/PayCenter/image/alipay.svg')"/>
                支付宝
            </a>
        @endif
        @if(\Module\PayCenter\Util\PayUtil::isAlipayWebEnable())
            <a class="item" href="javascript:;"
               data-type="{{\Module\PayCenter\Type\PayType::ALIPAY_WEB}}">
                <img class="icon" src="@asset('vendor/PayCenter/image/alipay.svg')"/>
                支付宝
            </a>
        @endif
        @if(\Module\PayCenter\Util\PayUtil::isWechatEnable())
            @if(\ModStart\Core\Util\AgentUtil::isMobile())
                @if(\ModStart\Core\Util\AgentUtil::isWechat())
                    <a class="item" href="javascript:;"
                       data-type="{{\Module\PayCenter\Type\PayType::WECHAT_MOBILE}}">
                        <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                        微信手机支付
                    </a>
                @else
                    <a class="item" href="javascript:;"
                       data-type="{{\Module\PayCenter\Type\PayType::WECHAT_H5}}">
                        <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                        微信H5支付
                    </a>
                @endif
            @else
                <a class="item" href="javascript:;"
                   data-type="{{\Module\PayCenter\Type\PayType::WECHAT}}">
                    <img class="icon" src="@asset('vendor/PayCenter/image/wechat.svg')"/>
                    微信扫码支付
                </a>
            @endif
        @endif
    </div>
@else
    <div class="ub-alert ub-alert-danger">
        未开通任何支付方式
    </div>
@endif
