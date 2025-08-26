@extends($_viewFrame)

@section('pageTitleMain'){{$cat['title']}}@endsection
@section('pageKeywords'){{$cat['title']}}@endsection
@section('pageDescription'){{$cat['title']}}@endsection

@section('bodyContent')

    <div class="ub-container">

        <div class="ub-breadcrumb">
            <a href="{{$__msRoot}}question">{{modstart_config('Question_Title','题库')}}</a>
            <a class="active" href="javascript:;">{{$cat['title']}}</a>
        </div>

        <div class="ub-cover tw-rounded-lg tw-p-4" style="color:#FFF;background-size:cover;background-image:url({{ $cat['bgCover'] }});">
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
                <div class="ub-panel">
                    <div class="head">
                        <div class="title">
                            <i class="iconfont icon-list-alt ub-color-a"></i>
                            分类练习
                        </div>
                    </div>
                    <div class="body" style="padding-left:0;">
                        @include('module::Question.View.inc.questionChapter',['records'=>\Module\Question\Util\QuestionChapterUtil::allTree($cat['id'])])
                    </div>
                </div>
                <div class="ub-panel">
                    <div class="head">
                        <div class="title">
                            <i class="iconfont icon-tag ub-color-b"></i>
                            标签练习
                        </div>
                    </div>
                    <div class="body">
                        <div class="ub-nav-category">
                            @foreach(\Module\Question\Util\QuestionTagUtil::groupTags($cat['id']) as $tagGroup)
                                <a class="group-title" href="javascript:;">{{$tagGroup['groupTitle']}}</a>
                                <div class="group-list">
                                    @foreach($tagGroup['groupTags'] as $tag)
                                        <a class="item"
                                           href="{{modstart_web_url('question/cat/'.$cat['id'].'/list?tagId='.$tag['id'])}}">{{$tag['title']}}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                @include('module::Question.View.inc.questionSearch')

                @if(modstart_module_enabled('QuestionEnhance'))
                    <div class="ub-panel margin-top">
                        <div class="head">
                            <div class="title">
                                <i class="iconfont icon-user ub-color-c"></i>
                                我的练习
                            </div>
                        </div>
                        <div class="body">
                            <a href="{{modstart_web_url('member_question_errors',['catId'=>$cat['id']])}}" class="tw-rounded tw-block ub-text-default hover:tw-bg-gray-100 tw-leading-10 tw-px-1 tw-flex tw-border-0 tw-border-b tw-border-dashed tw-border-gray-100">
                                <div class="tw-w-5">
                                    <i class="iconfont icon-book ub-color-a"></i>
                                </div>
                                <div class="tw-flex-grow">
                                    错题本
                                </div>
                                <div class="tw-text-right ub-text-muted">
                                    {{\Module\QuestionEnhance\Util\QuestionErrorsUtil::countCat(\Module\Member\Auth\MemberUser::id(),$cat['id'])}}
                                </div>
                            </a>
                            <a href="{{modstart_web_url('member_question_note',['catId'=>$cat['id']])}}" class="tw-rounded tw-block ub-text-default hover:tw-bg-gray-100 tw-leading-10 tw-px-1 tw-flex tw-border-0 tw-border-b tw-border-dashed tw-border-gray-100">
                                <div class="tw-w-5">
                                    <i class="iconfont icon-edit ub-color-b"></i>
                                </div>
                                <div class="tw-flex-grow">
                                    笔记
                                </div>
                                <div class="tw-text-right ub-text-muted">
                                    {{\Module\QuestionEnhance\Util\QuestionNoteUtil::countCat(\Module\Member\Auth\MemberUser::id(),$cat['id'])}}
                                </div>
                            </a>
                            <a href="{{modstart_web_url('member_question_fav',['catId'=>$cat['id']])}}" class="tw-rounded tw-block ub-text-default hover:tw-bg-gray-100 tw-leading-10 tw-px-1 tw-flex tw-border-0 tw-border-b tw-border-dashed tw-border-gray-100">
                                <div class="tw-w-5">
                                    <i class="iconfont icon-star ub-color-c"></i>
                                </div>
                                <div class="tw-flex-grow">
                                    收藏
                                </div>
                                <div class="tw-text-right ub-text-muted">
                                    {{\Module\QuestionEnhance\Util\QuestionFavUtil::countCat(\Module\Member\Auth\MemberUser::id(),$cat['id'])}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                @if(modstart_module_enabled('Ad'))
                    <div class="margin-top">
                        @include('module::Ad.View.pc.share.simple',['position'=>'pcQuestionCatRight'])
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
