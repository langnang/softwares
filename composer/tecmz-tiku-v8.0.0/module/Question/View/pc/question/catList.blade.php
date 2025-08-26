@extends($_viewFrame)

@section('pageTitleMain'){{$pageTitle}}@endsection
@section('pageKeywords'){{$pageKeywords}}@endsection
@section('pageDescription'){{$pageDescription}}@endsection

{!! \ModStart\ModStart::css('vendor/Question/style/question.css') !!}
@if(!empty($keywords))
{!! \ModStart\ModStart::js('asset/vendor/jqueryMark.js') !!}
{!! \ModStart\ModStart::script('$("[data-question-list] .question-title").mark('.json_encode($keywords).'.split("").join(" "),{separateWordSearch:true});') !!}
@endif

@section('bodyContent')

    <div class="ub-container">

        <div class="ub-breadcrumb">
            <a href="{{$__msRoot}}question">{{modstart_config('Question_Title','题库')}}</a>
            <a href="{{modstart_web_url('question/cat/'.$cat['id'])}}">{{$cat['title']}}</a>
            <a class="active" href="javascript:;">题目列表</a>
        </div>

        <div class="ub-cover tw-rounded-lg tw-p-4" style="color:#FFF;background-size:cover;background-image:url({{ \ModStart\Core\Assets\AssetsUtil::fixOrDefault($cat['bgCover'],'vendor/Question/image/catBgCover.jpg')  }});">
            <h1 class="title">
                <i class="iconfont icon-book"></i>
                {{$cat['title']}}
            </h1>
            <div class="body">
                共有 {{empty($cat['questionCount'])?0:$cat['questionCount']}} 道题
            </div>
        </div>
        <div class="row margin-top">
            <div class="col-md-9">

                @if($chapter)
                    <div class="ub-nav margin-bottom">
                        <div class="tag-label">
                            <i class="iconfont icon-list-alt"></i>
                            分类
                        </div>
                        <div class="tag-value tw-leading-8" style="margin-left:1rem;">
                            {{$chapter['title']}}
                            共{{$chapter['questionCount']}}题
                        </div>
                    </div>
                @endif

                @if($selectedTagOverSize)
                    <div class="ub-alert ub-alert-warning">
                        <i class="iconfont icon-warning"></i>
                        最多选择5个标签
                    </div>
                @endif

                @if(!empty($selectedTags) || $type || $keywords)
                    <div class="ub-nav margin-bottom">
                        <div class="tag-label">
                            <i class="iconfont icon-filter"></i>
                            筛选
                        </div>
                        <div class="tag-value" style="margin-left:1rem;">
                            @if(!empty($keywords))
                                <span class="tag-item">
                                    搜索<b class="ub-text-danger">{{$keywords}}</b>
                                    <a class="close" href="?{{\ModStart\Core\Input\Request::mergeQueries(['keywords'=>null])}}">
                                        <i class="iconfont icon-close"></i>
                                    </a>
                                </span>
                            @endif
                            @if($type)
                                <span class="tag-item">
                                    {{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,$type)}}
                                    <a class="close" href="?{{\ModStart\Core\Input\Request::mergeQueries(['type'=>null])}}">
                                        <i class="iconfont icon-close"></i>
                                    </a>
                                </span>
                            @endif
                            @foreach($selectedTags as $tag)
                                <span class="tag-item">
                                    {{$tag['title']}}
                                    <a class="close" href="?{{\ModStart\Core\Input\Request::mergeQueries(['tagId'=>join(',',\ModStart\Core\Util\ArrayUtil::remove($selectedTagIds,$tag['id']))])}}">
                                        <i class="iconfont icon-close"></i>
                                    </a>
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="ub-panel">
                    <div class="head">
                        <div class="title">题目列表</div>
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

            </div>
            <div class="col-md-3">

                @include('module::Question.View.inc.questionSearch')

                <div class="ub-panel" style="margin-top:1.5rem;">
                    <div class="body">
                        <div class="ub-nav-category">
                            <a class="group-title" href="javascript:;">
                                <i class="iconfont icon-list-alt"></i>
                                题目类型
                            </a>
                            <div class="group-list">
                                <a  class="item @if(empty($type)) active @endif" href="?{{\ModStart\Core\Input\Request::mergeQueries(['type'=>null])}}">全部</a>
                                @foreach(\Module\Question\Type\QuestionType::getList() as $k=>$v)
                                    <a href="?{{\ModStart\Core\Input\Request::mergeQueries(['type'=>$k])}}"
                                        class="item @if($type==$k) active @endif">{{$v}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ub-panel margin-top">
                    <div class="head">
                        <div class="title">
                            <i class="iconfont icon-tag"></i>
                            标签
                        </div>
                    </div>
                    <div class="body">
                        <div class="ub-nav-category">
                            @foreach($tags as $tagGroup)
                                <a class="group-title" href="javascript:;">{{$tagGroup['groupTitle']}}</a>
                                <div class="group-list">
                                    @foreach($tagGroup['groupTags'] as $tag)
                                        @if(in_array($tag['id'],$selectedTagIds))
                                            <a class="item active" href="?{{\ModStart\Core\Input\Request::mergeQueries(['tagId'=>join(',',\ModStart\Core\Util\ArrayUtil::remove($selectedTagIds,$tag['id'])),'page'=>1])}}">{{$tag['title']}}</a>
                                        @else
                                            <a class="item" href="?{{\ModStart\Core\Input\Request::mergeQueries(['tagId'=>join(',',\ModStart\Core\Util\ArrayUtil::add($selectedTagIds,$tag['id'])),'page'=>1])}}">{{$tag['title']}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
