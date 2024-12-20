<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
<link rel="stylesheet" href="/layui/rc/css/layui.css" media="all">
<link rel="stylesheet" href="/css/admin.css" media="all">
<style>
    .group-list {
        display: none;
        overflow: hidden;
        background: #009688;
        color: white;
        height: 100%;
    }
    .list-men {
        float: left;
        height: 100%;
    }
    .list-men li {
        padding: 10px;
        cursor: default;
    }
    .list-men li.active {
        background: #00ad9d;
    }
    .group-box {
        float: left;
        width: 410px;
    }
    .group-box > div {
        display: none;
        background: #00ad9d;
        height: 100%;
        padding: 15px;
        overflow: auto;
        height: 330px;
    }
    .layui-form-checkbox[lay-skin=primary] span {
        color: white;
    }
</style>

<div class="layui-form" style="padding: 20px 30px 0 0;">
    <form id="form1" onsubmit="return false" action="##" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" value="{{ $data['title'] }}" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <input type="text" name="description" value="{{ $data['description'] }}" placeholder="请输入描述" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">其他</label>
            <div class="layui-input-block">
                <input type="text" name="other" value="{{ $data['other'] }}" placeholder="请输入其他信息" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">规则</label>
            <div class="layui-input-block">
                <input type="text" name="auth_group" id="auth_group" value="{{ $data['auth_group'] }}" class="layui-input">
                <button class="layui-btn" id="group-btn">
                    展开规则器
                </button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline">
                <button id="form-submit" class="layui-btn">保存</button>
            </div>
        </div>
    </form>

    <div class="group-list" id="group-list">
        <ul class="list-men">
            <!-- class="active"-->
            @foreach ($author_list as $key=>$t)
                <li class="@if ($key == 0) active @endif">{{ $t['title'] }}</li>
            @endforeach
        </ul>
        <div class="group-box">
            @foreach ($author_list as $key=>$c)
                <div style="@if ($key == 0) display:block; @endif">
                    <ul>
                        @foreach ($c['children'] as $i)
                            <li style="height: 30px;">
                                <input type="checkbox" name="group_arr" title="{{ $i['title'] }} 路径: {{ $i['path'] }}" lay-skin="primary" value="{{ $i['id'] }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script type="application/javascript" src="/layui/layui.js"></script>
<script>
    layui.use(['form', 'layer'], function(){
        var $ = layui.$; //重点处
        var form = layui.form;

        var auth_group = "{{ $data['auth_group'] }}";
        var auth_group_arr = new Array(); //定义一数组
        auth_group_arr = auth_group.split(","); //字符分割


        $("#group-btn").on("click", function () {
            layer.open({
                type: 1
                ,title: '规则选择器'
                , shadeClose: true
                , area: ["500px", "400px"]
                , content: $('#group-list')
                , success: function () {
                    $("input:checkbox[name='group_arr']").each(function(i){
                        if(auth_group_arr.indexOf($(this).val()) >= 0){
                            $(this).prop("checked", true)
                        }
                    });
                    form.render();  //更新渲染
                }
                , end: function () {
                    //获取checkbox[name='like']的值
                    var arr = new Array();
                    $("input:checkbox[name='group_arr']:checked").each(function(i){
                        arr[i] = $(this).val();
                    });
                    $("#auth_group").val(arr);
                }
            });
        });
        $(".list-men li").on("click", function () {
            var index = $(this).index();
            $(this).addClass("active").siblings().removeClass("active");
            $(".group-box > div").eq(index).show().siblings().hide();
        });

        // 确认按钮
        $('#form-submit').on('click', function () {
            $.ajax({
                url: "../group_edit/{{ $data['id'] }}"
                ,type: "POST"
                ,dataType: "json"
                ,data: $('#form1').serialize()
                ,success: function (data) {
                    if(data.code==0){
                        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                        parent.layer.close(index);
                    }else{
                        layer.msg(data.msg)
                    }
                }
            });
        });
    });
</script>