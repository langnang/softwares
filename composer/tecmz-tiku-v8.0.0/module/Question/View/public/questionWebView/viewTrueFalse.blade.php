@if(!empty($paperQuestionNumber))
    <div class="pb-question-view-number">
        <div>
            @if($paperQuestionNumberCount>1)
                第 {{$paperQuestionNumber}}-{{$paperQuestionNumber+$paperQuestionNumberCount-1}} 题
            @else
                第 {{$paperQuestionNumber}} 题
            @endif
            &nbsp;&nbsp;
            判断题
        </div>
    </div>
@endif
<div class="pb-question-view">
    @if(empty($paperQuestionNumber))
        <div class="head">
            <div class="title">
                判断题
            </div>
        </div>
    @endif
    <div class="body">
        <div class="question" data-question-type="trueFalse" data-question-alias="{{$questionData['question']['alias']}}">
            <div class="question ub-html">
                {!! $questionData['question']['question'] !!}
            </div>
            <div class="option">
                @foreach($questionData['options'] as $index=>$option)
                    <div class="item" data-choice="{{chr(ord('A')+$index)}}">
                        <div class="choice">{{chr(ord('A')+$index)}}.</div>
                        {!! $option['option'] !!}
                    </div>
                @endforeach
            </div>
            <div class="answer-result"></div>
        </div>
    </div>
</div>
