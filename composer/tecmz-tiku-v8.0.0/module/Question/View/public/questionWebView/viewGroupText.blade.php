<div class="pb-question-view">
    <div class="head">
        <div class="title">
            @if(empty($paperQuestionNumber))
                第{{$questionItemNumber}}题
            @else
                第{{$paperQuestionNumber+$questionItemNumber-1}}题
            @endif
            问答
        </div>
    </div>
    <div class="body">

        <div class="question" data-question-type="text" data-question-alias="{{$questionItem['question']['alias']}}">
            <div class="question ub-html">
                {!! $questionItem['question']['question'] !!}
            </div>
            <div class="action">
                <a href="javascript:;" data-answer-show>查看答案</a>
            </div>
            <div class="answer-result"></div>
        </div>

    </div>
</div>
