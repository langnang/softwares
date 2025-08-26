@extends($_viewFrame)

@section('pageTitleMain')找回密码@endsection
@section('pageKeywords')找回密码@endsection
@section('pageDescription')找回密码@endsection

@section('bodyContent')

    <div class="ub-account">

        <div class="box">

            <div class="nav">
                <a href="{{$__msRoot}}login?redirect={{!empty($redirect)?urlencode($redirect):''}}" >登录</a>
                ·
                <a href="javascript:;" class="active">找回密码</a>
            </div>

            <div class="ub-form flat">
                <form action="{{\ModStart\Core\Input\Request::currentPageUrl()}}" method="post" data-ajax-form>
                    <div class="line">
                        <div class="field">
                            <?php $found = false; ?>
                            @if(modstart_config('retrieveEmailEnable',false))
                                <a class="btn btn-lg btn-block" href="{{$__msRoot}}retrieve/email?redirect={{!empty($redirect)?urlencode($redirect):''}}"><i class="iconfont icon-email"></i> 通过邮箱找回</a>
                                <?php $found = true; ?>
                            @endif
                            @if(modstart_config('retrievePhoneEnable',false))
                                <a class="btn btn-lg btn-block" href="{{$__msRoot}}retrieve/phone?redirect={{!empty($redirect)?urlencode($redirect):''}}"><i class="iconfont icon-phone"></i> 通过手机找回</a>
                                <?php $found = true; ?>
                            @endif
                            @if(!$found)
                                <div class="ub-alert ub-alert-danger">没有开启任何找回密码方式</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
