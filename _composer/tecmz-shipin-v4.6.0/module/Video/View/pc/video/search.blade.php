@extends($_viewFrame)

@section('pageTitleMain'){{'搜索：'.$keywords}}@endsection
@section('pageKeywords'){{'搜索：'.$keywords}}@endsection
@section('pageDescription'){{'搜索：'.$keywords}}@endsection

{!! \ModStart\ModStart::js('asset/vendor/jqueryMark.js') !!}

@section('bodyAppend')
    @parent
    <script>
        $(function () {
            $(".item-video-cover .title").mark({!! json_encode($keywords) !!}.split('').join(' '),{separateWordSearch:true});
        });
    </script>
@endsection
@section('bodyContent')

    <div class="ub-search-block">
        <div class="title">
            搜索视频
        </div>
        <div class="form">
            <form action="{{modstart_web_url('video/search')}}" method="get">
                <div class="box">
                    <input type="text" name="keywords" class="form form-lg" value="{{$keywords or ''}}" placeholder="输入关键词搜索" />
                    <button type="submit" class="btn btn-lg"><i class="iconfont icon-search"></i> 搜索</button>
                </div>
            </form>
        </div>
    </div>

    <div class="ub-container margin-top">
        <div class="ub-search-result">
            搜索 <span class="keyword">{{$keywords}}</span> ，共找到 <span class="count">{{$total}}</span> 条记录
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
                                                {{$item['countUp'] or '0'}}
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
