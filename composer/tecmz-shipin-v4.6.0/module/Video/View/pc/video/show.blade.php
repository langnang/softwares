@extends($_viewFrame)

@section('pageTitleMain'){{$video['title']}}@endsection
@section('pageKeywords'){{$video['title']}}@endsection
@section('pageDescription'){{$video['title']}}@endsection

{!! \ModStart\ModStart::css('vendor/Video/style/video.css') !!}
{!! \ModStart\ModStart::css('asset/vendor/videojs/video-js.css') !!}
{!! \ModStart\ModStart::js('asset/vendor/videojs/video-js.js') !!}

@section('headAppend')
    @parent
    <style type="text/css">
        .ub-video .player:after{margin-top:{{modstart_config('Video_ShowRatioPC',56)}}%;}
        @media screen and (max-width: 40rem) {
            .ub-video .player:after{margin-top:{{modstart_config('Video_ShowRatioMobile',60)}}%;}
        }
    </style>
@endsection

@section('bodyContent')

    <div style="background-color:#333;">
        <div class="ub-container">
            <div class="ub-video">
                <div class="player">
                    <video id="player"
                           class="video-js vjs-big-play-centered"
                           controls autoplay
                           preload="auto"
                           poster="{{$video['url']}}"
                           data-setup='{}'>
                        <source src="{{$video['url']}}" type="video/mp4" />
                        <p class="vjs-no-js">
                            当前浏览器不支持JavaScript
                        </p>
                    </video>
                    <script>
                        $(function () {
                            var player = window.videojs('player', {
                                autoplay:true
                            }, function onPlayerReady() {
                                this.play()
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="ub-container margin-top">
        <div class="row">
            <div class="col-md-8">
                <div class="ub-video-info">
                    <h1>{{$video['title']}}</h1>
                    <div class="stat">
                        <a href="{{modstart_web_url('video')}}?category_id={{$video['categoryId']}}">{{$video['_category']['name'] or ''}}</a>
                        <a href="javascript:;" class="tw-px-2">
                            <i class="iconfont icon-play"></i>
                            {{$video['countPlayed'] or '0'}}
                        </a>
                        @if(0)
                            <a href="{{modstart_web_url('video')}}/{{$video['id']}}">
                                <i class="iconfont icon-thumb-up"></i>
                                {{$video['countUp']}}
                            </a>
                        @endif
                    </div>
                    <div class="summary">
                        {{$video['summary']}}
                    </div>
                </div>
                @if(\ModStart\Module\ModuleManager::isModuleEnabled('MemberComment'))
                    @if(modstart_config('MemberComment_Enable',false))
                        <div class="margin-top" style="margin:1rem auto;">
                            @include('module::MemberComment.View.pc.public.comment',['biz'=>'video','bizId'=>$video['id']])
                        </div>
                    @else
                        <div class="tw-bg-gray-200 tw-py-4 tw-rounded margin-top tw-text-center">
                            <i class="iconfont icon-warning"></i>
                            需要安装并启用插件 <a href="https://modstart.com/m/MemberComment" target="_blank">MemberComment</a>
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-md-4">
                <div class="tw-bg-white tw-rounded tw-p-4">
                    <div class="tw-text-center">
                        @include('module::Vendor.View.public.shareButtons')
                    </div>
                </div>
                <div class="tw-bg-white tw-rounded tw-p-4 margin-top">
                    @if(!empty($videoPrev))
                        <div class="tw-py-2">
                            上一个：<a href="{{modstart_web_url('video/'.$videoPrev['id'])}}">{{$videoPrev['title']}}</a>
                        </div>
                    @endif
                    @if(!empty($videoNext))
                        <div class="tw-py-2">
                            下一个：<a href="{{modstart_web_url('video/'.$videoNext['id'])}}">{{$videoNext['title']}}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
