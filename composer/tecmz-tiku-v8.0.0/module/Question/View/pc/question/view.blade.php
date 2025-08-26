@extends($_viewFrame)

@section('pageTitleMain'){{\ModStart\Core\Util\HtmlUtil::text($questionData['question']['question'])}}@endsection
@section('pageKeywords'){{\ModStart\Core\Util\HtmlUtil::text($questionData['question']['question'])}}@endsection
@section('pageDescription'){{\ModStart\Core\Util\HtmlUtil::text($questionData['question']['question'])}}@endsection

{!! \ModStart\ModStart::js('asset/common/editor.js') !!}
{!! \ModStart\ModStart::css('vendor/Question/style/question.css') !!}
{!! \ModStart\ModStart::js('vendor/Question/entry/questionView.js') !!}
@section('bodyAppend')
    @parent
    <script>
        window.__selectorDialogServer = "{{modstart_web_url('member_data/file_manager')}}";
        window.__data = {
            alias: "{{$questionData['question']['alias']}}",
            memberUserId: {{intval($_memberUserId)}},
            ueditorServer: "{{modstart_web_url('member_data/ueditor')}}"
        }
    </script>
    <script src="@asset('asset/vendor/vue.js')"></script>
    <script src="@asset('asset/vendor/element-ui/index.js')"></script>
    @if(modstart_module_enabled('QuestionEnhance') && modstart_config('Question_CommentEnable',false))
        <script src="@asset('vendor/QuestionEnhance/entry/questionComment.js')"></script>
    @endif
@endsection

@section('bodyContent')

    <div class="ub-container">

        <div class="ub-breadcrumb">
            <a href="{{$__msRoot}}question">{{modstart_config('Question_Title','题库')}}</a>
            <a href="{{$__msRoot}}question/cat/{{$cat['id']}}">{{$cat['title']}}</a>
            <a href="{{$__msRoot}}question/cat/{{$cat['id']}}/list">题目列表</a>
            <a class="active" href="javascript:;">{{\ModStart\Core\Util\HtmlUtil::text($questionData['question']['question'],50)}}</a>
        </div>

        <div class="row">
            <div class="col-md-9">

                @if($questionData['question']['status'] == \Module\Question\Type\QuestionStatus::VERIFYING)
                    <div class="ub-alert ub-alert-warning ub-text-center">
                        <i class="iconfont icon-warning"></i>
                        当前题目正在审核
                    </div>
                @elseif($questionData['question']['status'] == \Module\Question\Type\QuestionStatus::VERIFY_FAIL)
                    <div class="ub-alert ub-alert-danger ub-text-center">
                        <i class="iconfont icon-warning"></i>
                        当前题目审核失败
                    </div>
                @endif

                @if($questionData['question']['type']==\Module\Question\Type\QuestionType::SINGLE_CHOICE)
                    @include('module::Question.View.public.questionWebView.viewSingleChoice')
                @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::MULTI_CHOICES)
                    @include('module::Question.View.public.questionWebView.viewMultiChoices')
                @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::TRUE_FALSE)
                    @include('module::Question.View.public.questionWebView.viewTrueFalse')
                @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::FILL)
                    @include('module::Question.View.public.questionWebView.viewFill')
                @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::TEXT)
                    @include('module::Question.View.public.questionWebView.viewText')
                @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::GROUP)
                    @include('module::Question.View.public.questionWebView.viewGroup')
                @endif

                <div class="row">
                    <div class="col-6">
                        <div class="tw-block tw-text-gray-600 tw-bg-white tw-rounded tw-p-4">
                            <div class="ub-text-muted">
                                上一题
                            </div>
                            <div>
                                @if($previousQuestion)
                                    <a class="tw-text-gray-600 ub-text-truncate tw-block" href="{{$__msRoot}}question/view/{{$previousQuestion['alias']}}{{$param?'?param='.urlencode($param):''}}">
                                        [{{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,$previousQuestion['type'])}}]
                                        {{\ModStart\Core\Util\HtmlUtil::text($previousQuestion['question'],100)}}
                                    </a>
                                @else
                                    <div class="ub-text-muted">
                                        没有了
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="tw-block tw-text-gray-600 tw-bg-white tw-rounded tw-p-4">
                            <div class="ub-text-muted tw-text-right">
                                下一题
                            </div>
                            <div>
                                @if($nextQuestion)
                                    <a class="tw-text-gray-600 ub-text-truncate tw-block" href="{{$__msRoot}}question/view/{{$nextQuestion['alias']}}{{$param?'?param='.urlencode($param):''}}">
                                        [{{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,$nextQuestion['type'])}}]
                                        {{\ModStart\Core\Util\HtmlUtil::text($nextQuestion['question'],100)}}
                                    </a>
                                @else
                                    <div class="ub-text-muted tw-text-right">
                                        没有了
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if(modstart_module_enabled('QuestionEnhance') && modstart_config('Question_CommentEnable',false))
                    <div class="margin-top">
                        <div id="appQuestionComment"></div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">

                <div class="ub-panel">
                    <div class="head">
                        <div class="more">
                            <a href="javascript:;" class="ub-text-muted" data-dialog-request="{{modstart_web_url('question/correct/'.$questionData['question']['id'])}}">
                                <i class="iconfont icon-warning"></i>
                                纠错
                            </a>
                        </div>
                        <div class="title">
                            <i class="iconfont icon-description"></i>
                            题目信息
                        </div>
                    </div>
                    <div class="body">
                        @if(!empty($questionData['question']['tag']))
                            <div>
                                @foreach($questionData['question']['tag'] as $tag)
                                    <span class="tw-inline-block tw-rounded-full tw-leading-6 tw-bg-white tw-border tw-border-solid tw-border-gray-300 tw-px-2 tw-text-gray-400 tw-mb-1">{{$tag['title']}}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="tw-pt-2 tw-mt-4 tw-flex tw-w-full tw-text-center ub-text-muted tw-border-0 tw-border-t tw-border-solid tw-border-gray-100">
                            <div class="tw-flex-grow">
                                <div>
                                    {{$questionData['question']['testCount']>0?sprintf('%d%%',$questionData['question']['passCount']*100/$questionData['question']['testCount']):'-'}}
                                </div>
                                <div>
                                    正确率
                                </div>
                            </div>
                            <div class="tw-flex-grow">
                                <div>
                                    {{empty($questionData['question']['commentCount'])?0:$questionData['question']['commentCount']}}
                                </div>
                                <div>
                                    评论
                                </div>
                            </div>
                            <div class="tw-flex-grow">
                                <div>
                                    {{empty($questionData['question']['clickCount'])?0:$questionData['question']['clickCount']}}
                                </div>
                                <div>
                                    点击
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(modstart_module_enabled('QuestionEnhance'))
                    <div class="tw-bg-white tw-rounded tw-p-4 margin-top">
                        <div class="tw-flex tw-text-center">
                            <div class="tw-flex-grow">
                                @include('module::QuestionEnhance.View.inc.favBtn',['questionId'=>$questionData['question']['id']])
                            </div>
                            <div class="tw-flex-grow">
                                @include('module::QuestionEnhance.View.inc.errorsBtn',['questionId'=>$questionData['question']['id']])
                            </div>
                        </div>
                    </div>
                    @include('module::QuestionEnhance.View.inc.notePanel',['questionId'=>$questionData['question']['id']])
                @endif

                @if(modstart_module_enabled('Ad'))
                    <div class="margin-top">
                        @include('module::Ad.View.pc.share.simple',['position'=>'pcQuestionViewRight'])
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
