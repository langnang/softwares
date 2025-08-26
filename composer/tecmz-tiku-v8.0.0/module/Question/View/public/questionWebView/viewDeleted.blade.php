@if(!empty($paperQuestionNumber))
    <div class="pb-question-view-number">
        <div>
            @if($paperQuestionNumberCount>1)
                第 {{$paperQuestionNumber}}-{{$paperQuestionNumber+$paperQuestionNumberCount-1}} 题
            @else
                第 {{$paperQuestionNumber}} 题
            @endif
            &nbsp;&nbsp;
            题目已被删除
        </div>
    </div>
@endif
<div class="pb-question-view">
    <div class="body">
        题目ID：{{json_encode($questionData)}}
    </div>
</div>
