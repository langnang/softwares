@if(empty($records))
    <div class="ub-empty">
        <div class="icon">
            <div class="iconfont icon-empty-box"></div>
        </div>
        <div class="text">暂无记录</div>
    </div>
@endif
@foreach($records as $record)
    @include('module::Question.View.inc.questionRecord',['record'=>$record])
@endforeach
