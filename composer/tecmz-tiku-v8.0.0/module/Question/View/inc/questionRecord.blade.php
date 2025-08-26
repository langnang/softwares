<div class="tw-flex tw-bg-gray-50  hover:tw-bg-gray-100 tw-rounded-lg tw-mb-1 tw-p-2">
    <div class="tw-text-center tw-w-14 tw-h-14 tw-text-sm tw-bg-white tw-rounded-lg tw-p-2 ub-text-default tw-flex-shrink-0">
        <i class="{{\Module\Question\Type\QuestionType::icon($record['type'])}}" style="font-size:1rem;line-height:1rem;"></i>
        <div>
            {{\ModStart\Core\Type\TypeUtil::name(\Module\Question\Type\QuestionType::class,$record['type'])}}
        </div>
    </div>
    <div class="tw-flex-grow tw-pl-2 tw-flex tw-flex-col tw-justify-center">
        <a href="{{modstart_web_url('question/view/'.$record['alias'])}}" class="ub-text-default tw-block question-title" @if(!empty($openBlank)) target="_blank" @endif>
            {{\ModStart\Core\Util\HtmlUtil::text($record['question'],100)}}
        </a>
        @if(!empty($record['tag']))
            <div class="tw-mt-2">
                @foreach($record['tag'] as $tag)
                    <span class="tw-inline-block tw-rounded-full tw-leading-6 tw-bg-white tw-border tw-border-solid tw-border-gray-300 tw-px-2 tw-text-gray-400">{{$tag['title']}}</span>
                @endforeach
            </div>
        @endif
    </div>
    <div class="tw-text-center tw-w-16 tw-text-gray-400 tw-flex tw-flex-col tw-justify-center tw-flex-shrink-0">
        <div>
            <i class="iconfont icon-eye"></i>
            <br>
            {{$record['clickCount']?$record['clickCount']:0}}
        </div>
    </div>
    <view class="tw-text-center tw-w-16 tw-text-gray-400 tw-flex tw-flex-col tw-justify-center tw-flex-shrink-0">
        <div>
            <i class="iconfont icon-comment"></i>
            <br>
            {{$record['commentCount']?$record['commentCount']:0}}
        </div>
    </view>
</div>
