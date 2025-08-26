 <div class="pb-public-question-view">
    <div class="number">
        @if($number!==null)
            第 {{$number}} 题
            &nbsp;&nbsp;
        @endif
        问答题
    </div>
    <div class="body">
        <div class="question">
            {!! $questionData['question']['question'] !!}
        </div>
        @if(!empty($option['hasAnswer']))
            <div class="answer">
                <div class="label"><i class="iconfont icon-details"></i> 答案</div>
                <div class="content">
                    {!! $questionData['answer']['answer'] !!}
                </div>
            </div>
        @endif
        @if(!empty($option['hasAnalysis']) && !empty($questionData['analysis']['analysis']))
            <div class="analysis">
                <div class="label"><i class="iconfont icon-details"></i> 解析</div>
                <div class="content">
                    {!! $questionData['analysis']['analysis'] !!}
                </div>
            </div>
        @endif
    </div>
</div>

