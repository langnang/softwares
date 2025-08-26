<div>
    <div class="ub-search-block-a mini">
        <form method="get" action="{{modstart_web_url('question/cat/'.$cat['id'].'/list')}}">
            <input class="input" type="text" name="keywords" value="{{empty($keywords)?'':$keywords}}" placeholder="搜索 题目" onkeypress="if(event.keyCode===13){$(this).closest('form').submit();}" />
            <a class="search-btn" href="javascript:;" onclick="$(this).closest('form').submit();"><span class="iconfont icon-search"></span> 搜索</a>
            @if(!empty($chapter))
                <input type="hidden" name="chapterId" value="{{$chapter?$chapter['id']:''}}">
            @endif
            @if(!empty($type))
                <input type="hidden" name="type" value="{{$type?$type:''}}">
            @endif
            @if(!empty($selectedTagIds))
                <input type="hidden" name="tagId" value="{{join(',',$selectedTagIds)}}">
            @endif
        </form>
    </div>
</div>
