<div class="ub-panel">
    <div class="head">
        <div class="title">
            报表筛选
        </div>
    </div>
    <div class="body">
        <form data-form action="?" method="GET">
            <div class="ub-lister-search">
                <div class="field">
                    <div class="name">时间范围</div>
                    <div class="input">
                        <input type="text" name="filterTimeStart" value="{{$filterTimeStart}}" class="form" data-min style="width:8em;"/>
                        -
                        <input type="text" name="filterTimeEnd" value="{{$filterTimeEnd}}" class="form" data-max style="width:8em;"/>
                    </div>
                </div>
                <div class="field">
                    <button type="submit" class="btn btn-primary">
                        <i class="iconfont icon-search"></i>
                        确定
                    </button>
                    <a href="?" class="btn">
                        <i class="iconfont icon-refresh"></i>
                        重置
                    </a>
                </div>
            </div>
        </form>
        <script>
            $(function (){
                var $form = $('[data-form]');
                layui.use('laydate', function () {
                    var laydate = layui.laydate;
                    laydate.render({
                        elem: $form.find('[data-min]').get(0),
                        type: 'date'
                    });
                    laydate.render({
                        elem: $form.find('[data-max]').get(0),
                        type: 'date'
                    });
                });
            });
        </script>
    </div>
</div>
