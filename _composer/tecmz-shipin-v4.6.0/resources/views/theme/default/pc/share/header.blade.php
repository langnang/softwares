<header class="ub-header-b">
    <div class="ub-container">
        <div class="menu">
            @if(\Module\Member\Auth\MemberUser::id())
                <a href="{{modstart_web_url('member_message')}}">
                    <i class="iconfont icon-bell"></i>
                    <?php $count = \Module\Member\Util\MemberMessageUtil::getUnreadMessageCount(\Module\Member\Auth\MemberUser::id()); ?>
                    <span class="badge @if(!$count) hide @endif" data-member-unread-message-count>{{$count}}</span>
                </a>
                <a href="{{modstart_web_url('member')}}"><i class="iconfont icon-user"></i> {{\Module\Member\Auth\MemberUser::get('username')}}</a>
                <a href="javascript:;" data-confirm="确认退出？" data-href="/logout">退出</a>
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
            <div class="search">
                <div class="box">
                    <form action="{{modstart_web_url('video/search')}}" method="get">
                        <input type="text" name="keywords" value="{{Input::get('keywords','')}}" placeholder="搜索 视频"/>
                        <button type="submit"><i class="iconfont icon-search1"></i></button>
                    </form>
                </div>
            </div>
            {!! \Module\Nav\Render\NavRender::position('head') !!}
        </div>
        <a class="nav-toggle" href="javascript:;" onclick="MS.header.trigger()">
            <i class="show iconfont icon-list"></i>
            <i class="close iconfont icon-close"></i>
        </a>
    </div>
</header>
