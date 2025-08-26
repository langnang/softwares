@if($answerInfo['judge'])
    @if($answerInfo['correct'])
        <div class="answer-result-correct" data-answer-correct>
            <div class="result"><i class="iconfont icon-check"></i> 回答正确</div>
        </div>
    @else
        <div class="answer-result-incorrect" data-answer-incorrect>
            <div class="result"><i class="iconfont icon-warning"></i> 回答错误</div>
        </div>
    @endif
@endif
@if($questionData['question']['type']!=\Module\Question\Type\QuestionType::GROUP)
    <div class="answer" data-answer>
        <div class="answer-head"><i class="iconfont icon-file"></i> 答案</div>
        <div class="answer-body ub-html">
            @if($questionData['question']['type']==\Module\Question\Type\QuestionType::SINGLE_CHOICE)
                {{$answerInfo['answer']}}
                @if(empty($answerInfo['answer']))
                    <p class="ub-text-muted">无答案</p>
                @endif
            @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::MULTI_CHOICES)
                {{join('，',$answerInfo['answer'])}}
                @if(empty($answerInfo['answer']))
                    <p class="ub-text-muted">无答案</p>
                @endif
            @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::TRUE_FALSE)
                {{$answerInfo['answer']}}
                @if(empty($answerInfo['answer']))
                    <p class="ub-text-muted">无答案</p>
                @endif
            @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::FILL)
                @foreach($answerInfo['answer'] as $ans)
                    <div>
                        {!! $ans !!}
                    </div>
                @endforeach
                @if(empty($answerInfo['answer']))
                    <p class="ub-text-muted">无答案</p>
                @endif
            @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::TEXT)
                {!! $answerInfo['answer'] !!}
            @elseif($questionData['question']['type']==\Module\Question\Type\QuestionType::GROUP)
            @endif
        </div>
    </div>
@endif
@if($questionData['analysis']['analysis'])
    <div class="analysis" data-analysis>
        <div class="analysis-head"><i class="iconfont icon-file"></i> 解析</div>
        <div class="analysis-body ub-html">
            {!! $questionData['analysis']['analysis'] !!}
        </div>
    </div>
@endif
