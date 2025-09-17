@if(!empty($paperQuestionNumber))
    <div class="pb-question-view-number">
        <div>
            @if($paperQuestionNumberCount>1)
                第 {{$paperQuestionNumber}}-{{$paperQuestionNumber+$paperQuestionNumberCount-1}} 题
            @else
                第 {{$paperQuestionNumber}} 题
            @endif
            &nbsp;&nbsp;
            {{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,\Module\Question\Type\QuestionType::GROUP)}}
        </div>
    </div>
@endif
<div class="pb-question-view">
    @if(empty($paperQuestionNumber))
        <div class="head">
            <div class="title">
                {{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,\Module\Question\Type\QuestionType::GROUP)}}
            </div>
        </div>
    @endif
    <div class="body" data-question-type="group" data-question-alias="{{$questionData['question']['alias']}}">

        <div class="question">
            <div class="question ub-html">
                {!! $questionData['question']['question'] !!}
            </div>
        </div>

        <div class="question-items">

            <?php $questionItemNumber = 1; ?>
            @foreach($questionData['items'] as $questionItemIndex=>$questionItem)
                @if($questionItem['question']['type']==\Module\Question\Type\QuestionType::SINGLE_CHOICE)
                    @include('module::Question.View.public.questionWebView.viewGroupSingleChoice')
                @elseif($questionItem['question']['type']==\Module\Question\Type\QuestionType::MULTI_CHOICES)
                    @include('module::Question.View.public.questionWebView.viewGroupMultiChoices')
                @elseif($questionItem['question']['type']==\Module\Question\Type\QuestionType::TRUE_FALSE)
                    @include('module::Question.View.public.questionWebView.viewGroupTrueFalse')
                @elseif($questionItem['question']['type']==\Module\Question\Type\QuestionType::FILL)
                    @include('module::Question.View.public.questionWebView.viewGroupFill')
                    <?php $questionItemNumber+=count($questionItem['answers'])-1; ?>
                @elseif($questionItem['question']['type']==\Module\Question\Type\QuestionType::TEXT)
                    @include('module::Question.View.public.questionWebView.viewGroupText')
                @endif
                <?php $questionItemNumber++; ?>
            @endforeach

        </div>

        <div class="question question-analysis">
            <div class="answer-result"></div>
        </div>

    </div>
</div>

