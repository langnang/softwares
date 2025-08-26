@extends($_viewFrame)

@section('pageTitleMain'){{$pageTitle}}@endsection
@section('pageKeywords'){{$pageKeywords}}@endsection
@section('pageDescription'){{$pageDescription}}@endsection

{!! \ModStart\ModStart::js('asset/vendor/jqueryMark.js') !!}
{!! \ModStart\ModStart::css('vendor/Question/style/question.css') !!}

@section('bodyAppend')
    @parent
    <script>
        $(function () {
            $("[data-question-list] .question-title").mark({!! json_encode($keywords) !!}.split('').join(' '), {separateWordSearch: true});
        });
    </script>
@endsection

@section('bodyContent')

    <div class="ub-container">

        <div class="ub-breadcrumb">
            <a href="{{$__msRoot}}question">{{modstart_config('Question_Title','题库')}}</a>
            <a class="active" href="javascript:;">搜索题目</a>
        </div>


        <div class="ub-panel" style="margin-top:1rem;">
            <div class="body">
                <div class="ub-search-block-a">
                    <input class="input" type="text" placeholder="搜索 题目" value="{{$keywords or ''}}"
                           onkeypress="if(event.keyCode===13){window.location.href='{{$__msRoot}}question/search?keywords='+window.api.util.urlencode($(this).val());}"/>
                    <a class="search-btn" href="javascript:;"
                       onclick="window.location.href='{{$__msRoot}}question/search?keywords='+window.api.util.urlencode($(this).prev().val());"><span
                            class="iconfont icon-search"></span> 搜索</a>
                </div>
                @if(empty($keywords))
                    <div class="ub-alert ub-alert-warning ub-text-center margin-top margin-bottom-remove">
                        <i class="iconfont icon-warning"></i>
                        请输入关键词
                    </div>
                @endif
            </div>
        </div>

        @if(empty($keywords))
            <div class="ub-empty" style="min-height:calc(100vh - 350px);">
                <div class="icon">
                    <div class="iconfont icon-empty-box"></div>
                </div>
                <div class="text">暂无记录</div>
            </div>
        @endif

        @if(!empty($keywords))
            <div class="ub-panel">
                <div class="head">
                    <div class="title">搜索结果</div>
                </div>
                <div class="body" data-question-list>
                    @include('module::Question.View.inc.questionRecords',['records'=>$records])
                </div>
                <div class="body">
                    <div class="ub-page">
                        {!! $pageHtml !!}
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
