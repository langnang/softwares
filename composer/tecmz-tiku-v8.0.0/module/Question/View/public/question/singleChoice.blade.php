 <div class="pb-public-question-view">
    <div class="number">
        @if($number!==null)
            第 {{$number}} 题
            &nbsp;&nbsp;
        @endif
        单选题
    </div>
    <div class="body">
        <div class="question">
            {!! $questionData['question']['question'] !!}
        </div>
        <div class="option">
            <?php $answers = []; ?>
            @foreach($questionData['options'] as $index=>$opt)
                <div class="item">
                    <div class="choice">{{chr(ord('A')+$index)}}.</div>
                    {!! $opt['option'] !!}
                </div>
                <?php
                if($opt['isAnswer']){
                    $answers[]=chr(ord('A')+$index);
                }
                ?>
            @endforeach
        </div>
        @if(!empty($option['hasAnswer']))
            <div class="answer">
                <div class="label"><i class="iconfont icon-details"></i> 答案</div>
                <div class="content">
                    {{join('，',$answers)}}
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

