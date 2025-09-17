@extends($_viewFrame)

@if($videoCategory)
    @section('pageTitleMain'){{$videoCategory['name']}}@endsection
    @section('pageKeywords'){{$videoCategory['name']}}@endsection
    @section('pageDescription'){{$videoCategory['name']}}@endsection
@else
    @section('pageTitleMain')视频@endsection
    @section('pageKeywords')视频@endsection
    @section('pageDescription')视频@endsection
@endif

@section('bodyContent')

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
                                <div class="icon"><i class="iconfont icon-empty-box"></i></div>
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
                                        <i class="iconfont icon-play"></i>
                                        {{$item['countPlayed'] or '0'}}
                                    </a>
                                    @if(0)
                                    <a href="{{modstart_web_url('video')}}/{{$item['id']}}">
                                        <i class="iconfont icon-thumb-up"></i>
                                        {{$item['countUp']}}
                                    </a>
                                    @endif
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
