@foreach($records as $c)
    <div class="tw-pl-4 tw-leading-10 tw-border-0">
        <div class="tw-flex tw-w-full tw-px-2 tw-rounded hover:tw-bg-gray-100" data-list>
            <div>
                <i class="iconfont icon-angle-right ub-text-muted"></i>
            </div>
            <div class="tw-flex-grow {{empty($c['_child'])?'':'tw-cursor-pointer'}}"
                 onclick="$(this).closest('[data-list]').next().toggleClass('tw-hidden')">
                {{$c['title']}}
            </div>
            <div class="tw-w-16 tw-text-right ub-text-muted">
                {{empty($c['questionCount']) ? 0 : $c['questionCount']}}题
            </div>
            <div class="tw-w-20 tw-text-right">
                <a href="{{modstart_web_url('question/cat/'.$cat['id'].'/list?chapterId='.$c['id'])}}" class="ub-text-primary">
                    <i class="iconfont icon-right"></i>
                    去练习
                </a>
            </div>
        </div>
        @if(!empty($c['_child']))
            <div class="tw-hidden">
                @include('module::Question.View.inc.questionChapter',['records'=>$c['_child']])
            </div>
        @endif
    </div>
@endforeach
