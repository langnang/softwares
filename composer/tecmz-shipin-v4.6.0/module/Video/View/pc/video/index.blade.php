@extends($_viewFrame)

@section('pageTitle'){{modstart_config('siteName').' - '.modstart_config('siteSlogan')}}@endsection

@section('bodyContent')

    @if(\ModStart\Module\ModuleManager::isModuleEnabled('Video'))
        @include('module::Banner.View.pc.public.banner',['position'=>'video'])
    @endif

    <div class="ub-container">
        <div class="ub-nav margin-top">
            <a href="{{modstart_web_url('video')}}" @if(empty($videoCategory)) class="active" @endif>全部</a>
            @foreach(\Module\Video\Util\VideoCategoryUtil::listCategories() as $item)
                <a href="{{modstart_web_url('video')}}?categoryId={{$item['id']}}" @if($videoCategory && $videoCategory['id']==$item['id']) class="active" @endif>{{$item['name']}}</a>
            @endforeach
        </div>
    </div>

    <div class="ub-container">
        <div class="ub-list no-bg">
            <div class="head">
                <div class="title">
                    视频列表
                </div>
            </div>
            <div class="body">
                <div class="row">
                    @if(empty($records))
                        <div class="col-md-12 col-12">
                            <div class="ub-empty">
                                <div class="icon"><i class="iconfont icon-emptybox"></i></div>
                                <div class="text">暂无记录</div>
                            </div>
                        </div>
                    @endif
                    @foreach($records as $item)
                        <div class="col-md-3 col-6">
                            <div class="item-video-cover">
                                <a class="cover" href="{{modstart_web_url('video')}}/{{$item['id']}}" style="background-image:url({{\ModStart\Core\Assets\AssetsUtil::fix($item['cover'])}});"></a>
                                <a class="title" href="{{modstart_web_url('video')}}/{{$item['id']}}">{{$item['title']}}</a>
                                <div class="category">
                                    <div class="stat">
                                        <a href="{{modstart_web_url('video')}}/{{$item['id']}}">
                                            <i class="iconfont icon-play3"></i>
                                            {{$item['countPlayed']}}
                                        </a>
                                        <a href="{{modstart_web_url('video')}}/{{$item['id']}}">
                                            <i class="iconfont icon-thumbsoup"></i>
                                            {{$item['countUp']}}
                                        </a>
                                    </div>
                                    <a href="{{modstart_web_url('video')}}?categoryId={{$item['categoryId']}}">{{$item['_category']['name'] or ''}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="ub-container">
        <div class="ub-page">
            {!! $pageHtml !!}
        </div>
    </div>

@endsection
