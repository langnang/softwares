<div class="pb-question-view">
    <div class="head">
        <div class="title">
            @if(empty($paperQuestionNumber))
                @if(count($questionItem['answers'])>1)
                    第 {{$questionItemNumber}} - {{$questionItemNumber+count($questionItem['answers'])-1}} 第
                @else
                    第 {{$questionItemNumber}} 题
                @endif
            @else
                @if(count($questionItem['answers'])>1)
                    第 {{$paperQuestionNumber+$questionItemNumber-1}} - {{$paperQuestionNumber+$questionItemNumber-1+count($questionItem['answers'])-1}} 第
                @else
                    第 {{$paperQuestionNumber+$questionItemNumber-1}} 题
                @endif
            @endif
            填空
        </div>
    </div>
    <div class="body">

        <div class="question" data-question-type="fill" data-question-alias="{{$questionItem['question']['alias']}}">
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
