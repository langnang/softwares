<header class="ub-header-b">
    <div class="ub-container">
        <div class="menu">
            <a class="ub-color-vip" href="/member_vip">
                <i class="iconfont icon-vip"></i>
                {{\Module\Member\Auth\MemberVip::get('title')}}
            </a>
            @if(\Module\Member\Auth\MemberUser::id())
                <a href="{{modstart_web_url('member')}}"><i class="iconfont icon-user"></i> {{\Module\Member\Auth\MemberUser::get('username')}}</a>
            @else
                <a href="{{modstart_web_url('login')}}">登录</a>
                <a href="{{modstart_web_url('register')}}">注册</a>
            @endif
        </div>
        <div class="logo">
            <a href="{{modstart_web_url('')}}">
                <img src="{{\ModStart\Core\Assets\AssetsUtil::fix(modstart_config('siteLogo'))}}"/>
            </a>
        </div>
        <div class="nav-mask" onclick="MS.header.hide()"></div>
        <div class="nav">
            {!! \Module\Nav\Render\NavRender::position('header') !!}
        </div>
        <a class="nav-toggle" href="javascript:;" onclick="MS.header.trigger()">
            <i class="show iconfont icon-list"></i>
            <i class="close iconfont icon-close"></i>
        </a>
    </div>
</header>
