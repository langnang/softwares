@if(!empty($paperQuestionNumber))
    <div class="pb-question-view-number">
        <div>
            @if($paperQuestionNumberCount>1)
                第 {{$paperQuestionNumber}}-{{$paperQuestionNumber+$paperQuestionNumberCount-1}} 题
            @else
                第 {{$paperQuestionNumber}} 题
            @endif
            &nbsp;&nbsp;
            填空题
        </div>
    </div>
@endif
<div class="pb-question-view">
    @if(empty($paperQuestionNumber))
        <div class="head">
            <div class="title">
                填空题
            </div>
        </div>
    @endif
    <div class="body">

        <div class="question" data-question-type="fill" data-question-alias="{{$questionData['question']['alias']}}">
            <div class="question ub-html">
                {!! $questionData['question']['question'] !!}
            </div>
            <div class="action">
                <a href="javascript:;" data-answer-show>查看答案</a>
            </div>
            <div class="answer-result"></div>
        </div>

    </div>
</div>
