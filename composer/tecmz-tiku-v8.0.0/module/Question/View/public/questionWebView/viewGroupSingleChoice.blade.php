<div class="pb-question-view">
    <div class="head">
        <div class="title">
            @if(empty($paperQuestionNumber))
                第{{$questionItemNumber}}题
            @else
                第{{$paperQuestionNumber+$questionItemNumber-1}}题
            @endif
            单选
        </div>
    </div>
    <div class="body">

        <div class="question" data-question-type="singleChoice" data-question-alias="{{$questionItem['question']['alias']}}">
            <div class="question ub-html">
                {!! $questionItem['question']['question'] !!}
            </div>
            <div class="option">
                @foreach($questionItem['options'] as $index=>$option)
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
