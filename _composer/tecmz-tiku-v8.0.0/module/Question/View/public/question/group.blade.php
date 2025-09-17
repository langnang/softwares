 <div class="pb-public-question-view">
     <div class="number">
         @if($number!==null)
             @if(count($questionData['items'])>1)
                 第 {{$number}} - {{$number+count($questionData['items'])-1}} 题
             @else
                 第 {{$number}} 题
             @endif
             &nbsp;&nbsp;
         @endif
         组合题
     </div>
    <div class="group-question">
        {!! $questionData['question']['question'] !!}
    </div>
    <div class="group-body">
        {!! $groupQuestionHtml !!}
    </div>
     @if(!empty($option['hasAnalysis']) && !empty($questionData['analysis']['analysis']))
         <div class="analysis">
             <div class="label"><i class="iconfont icon-details"></i> 解析</div>
             <div class="content">
                 {!! $questionData['analysis']['analysis'] !!}
             </div>
         </div>
     @endif
</div>

