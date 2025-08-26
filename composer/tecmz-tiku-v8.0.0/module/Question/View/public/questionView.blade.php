<style type="text/css">
    .ub-html p{margin:0;}
</style>
<div class="tw-bg-gray-100 tw-rounded tw-leading-6">
    <div class="tw-bg-gray-300 tw-rounded tw-p-1">
        <i class="{{\Module\Question\Type\QuestionType::icon($question['type'])}}"></i>
        {{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,$question['type'])}}
    </div>
    <div class="tw-p-1">
        <div class="ub-html">
            {!! $question['question'] !!}
        </div>
        @if(in_array($question['type'],[\Module\Question\Type\QuestionType::SINGLE_CHOICE,\Module\Question\Type\QuestionType::MULTI_CHOICES,\Module\Question\Type\QuestionType::TRUE_FALSE]))
            <div class="ub-html">
                <?php $answers = []; ?>
                @foreach($options as $index=>$option)
                    <div style="padding:0 0 0 1rem;">
                        <div style="float:left;margin:0 0 0 -1rem;">{{chr(ord('A')+$index)}}.</div>
                        {!! $option['option'] !!}
                    </div>
                    <?php
                    if($option['isAnswer']){
                        $answers[]=chr(ord('A')+$index);
                    }
                    ?>
                @endforeach
            </div>
            <div class="tw-bg-gray-200 tw-rounded tw-p-1">
                答案:
                {{join('，',$answers)}}
            </div>
        @endif
        @if($question['type']==\Module\Question\Type\QuestionType::FILL)
            <div class="tw-bg-gray-200 tw-rounded tw-p-1 ub-html">
                答案:
                @foreach($answers as $index=>$answer)
                    <div style="padding:0 0 0 1rem;">
                        <div style="float:left;margin:0 0 0 -1rem;">{{$index+1}}.</div>
                        {!! $answer['answer'] !!}
                    </div>
                @endforeach
            </div>
        @endif
        @if($question['type']==\Module\Question\Type\QuestionType::TEXT)
            <div class="tw-bg-gray-200 tw-rounded tw-p-1 ub-html">
                答案:
                {!! $answer['answer'] !!}
            </div>
        @endif
        @if($question['type']==\Module\Question\Type\QuestionType::GROUP)
            <div style="padding:10px 0;">
                <?php $number =1; ?>
                @foreach($items as $index=>$item)
                    <div class="tw-bg-white tw-p-1 tw-rounded tw-relative tw-mb-2">
                        <div class="tw-bg-gray-300 tw-text-white tw-leading-6 tw-absolute tw-left-0 tw-top-0 tw-rounded tw-px-4">
                            @if($item['question']['type']==\Module\Question\Type\QuestionType::FILL && count($item['answers'])>1)
                                {{$number}}-{{$number+count($item['answers'])-1}}
                                <?php $number+=count($item['answers']); ?>
                            @else
                                {{$number}}
                                <?php $number++; ?>
                            @endif
                        </div>
                        <div class="tw-mt-6 ub-html">
                            {!! $item['question']['question'] !!}
                        </div>

                        @if(in_array($item['question']['type'],[\Module\Question\Type\QuestionType::SINGLE_CHOICE,\Module\Question\Type\QuestionType::MULTI_CHOICES,\Module\Question\Type\QuestionType::TRUE_FALSE]))
                            <div class="ub-html">
                                <?php $answers = []; ?>
                                @foreach($item['options'] as $index=>$option)
                                    <div style="padding:0 0 0 1rem;">
                                        <div style="float:left;margin:0 0 0 -1rem;">{{chr(ord('A')+$index)}}.</div>
                                        {!! $option['option'] !!}
                                    </div>
                                    <?php
                                    if($option['isAnswer']){
                                        $answers[]=chr(ord('A')+$index);
                                    }
                                    ?>
                                @endforeach
                            </div>
                            <div class="tw-bg-gray-200 tw-rounded tw-p-1">
                                答案:
                                {{join('，',$answers)}}
                            </div>
                        @endif
                        @if($item['question']['type']==\Module\Question\Type\QuestionType::FILL)
                            <div class="tw-bg-gray-200 tw-rounded tw-p-1 ub-html">
                                答案：
                                @foreach($item['answers'] as $index=>$answer)
                                    <div style="padding:0 0 0 1rem;">
                                        <div style="float:left;margin:0 0 0 -1rem;">{{$index+1}}.</div>
                                        {!! $answer['answer'] !!}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if($item['question']['type']==\Module\Question\Type\QuestionType::TEXT)
                            <div class="tw-bg-gray-200 tw-rounded tw-p-1 ub-html">
                                答案:
                                {!! $item['answer']['answer'] !!}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @if(empty($analysisHide) && $analysis['analysis'])
        <div class="tw-bg-gray-100 tw-rounded tw-leading-6">
            <div class="tw-bg-gray-300 tw-rounded tw-p-1">
                解析
            </div>
            <div class="ub-html tw-p-1">
                {!! $analysis['analysis'] !!}
            </div>
        </div>
    @endif
</div>
