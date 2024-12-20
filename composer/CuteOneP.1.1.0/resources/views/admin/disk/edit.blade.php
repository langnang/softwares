<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
<link rel="stylesheet" href="/layui/rc/css/layui.css" media="all">
<link rel="stylesheet" href="/css/admin.css" media="all">

<div class="layui-form" style="padding: 20px 30px 0 0;">
    @if ($free === 0)
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
            <label class="layui-form-label">
                描述
            </label>
            <div class="layui-input-block">
                <textarea name="description" placeholder="请输入描述" class="layui-textarea">{{ $data['description'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                应用机密
                <button class="layui-btn layui-btn-normal layui-btn-xs" id="onSecret">获取应用机密</button>
            </label>
            <div class="layui-input-block">
                <input type="text" name="client_secret" value="{{ $data['client_secret'] }}" placeholder="请输入应用机密" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                应用ID
            </label>
            <div class="layui-input-block">
                <input type="text" name="client_id" id="client_id" value="{{ $data['client_id'] }}" placeholder="请输入应用ID" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                应用Code
                <button class="layui-btn layui-btn-normal layui-btn-xs" id="onCode">获取Code</button>
            </label>
            <div class="layui-input-block">
                <textarea name="code" placeholder="请输入应用Code  -  ( 网盘正常, 请留空 )" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网盘类型</label>
            <div class="layui-input-block">
                <input type="radio" name="types" value="1" lay-filter="types" title="国际版OneDrive" @if ($data['types'] == 1) checked @endif>
                <input type="radio" name="types" value="2" lay-filter="types" title="世纪互联" @if ($data['types'] == 2) checked @endif>
            </div>
        </div>
        <div class="layui-form-item" id="other" style="display: @if ($data['other'] == 2)block @else none @endif;">
            <label class="layui-form-label">前缀</label>
            <div class="layui-input-block">
                <input type="text" name="other" value="{{ $data['other'] }}" placeholder="请输入前缀" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline">
                <button id="form-submit" class="layui-btn">保存</button>
            </div>
        </div>
    </form>
    @else
        <p style="text-align: center;font-size: 20px;padding-top: 100px;">开源版只能添加一个网盘！</p>
    @endif
</div>

<script type="application/javascript" src="/layui/layui.js"></script>
<script>
    layui.use(['jquery', 'form', 'layer'], function(){
        var $ = layui.$; //重点处
        var form = layui.form;

        var domain = "{{ $redirect_url }}";

        form.on('radio(types)', function (data) {
            if(data.value=="2"){
                $("#other").show()
            }else{
                $("#other").hide()
            }
        });


        // 获取onSecret
        $("#onSecret").on("click", function () {
            var url = 'https://apps.dev.microsoft.com/?referrer=https%3a%2f%2fdeveloper.microsoft.com%2fzh-cn%2fgraph%2fquick-start#/quickstart/graphIO?publicClientSupport=false&appName=CuteOne&redirectUrl='+domain+'&allowImplicitFlow=false&ru=https:%2F%2Fdeveloper.microsoft.com%2Fzh-cn%2Fgraph%2Fquick-start%3FappID%3D_appId_%26appName%3D_appName_%26redirectUrl%3Dhttp://127.0.0.1/%26platform%3Doption-php'
            window.open(url);
        });

        // 获取onCode
        $("#onCode").on("click", function () {
            var client_id = $("#client_id").val();
            var types = $("input[name='types']:checked").val();
            if(types == "1"){
                var url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize?response_type=code&client_id='+client_id+'&redirect_uri='+domain+'&scope=offline_access%20files.readwrite.all'
            }else{
                var url = 'https://login.partner.microsoftonline.cn/common/oauth2/authorize?response_type=code&client_id='+client_id+'&redirect_uri='+domain+'&scope=offline_access%20user.read%20files.readwrite.all'
            }
            window.open(url);
        });



        // 确认按钮
        $('#form-submit').on('click', function () {
            $.ajax({
                url: "/admin/disk/edit/{{ $data['id'] }}"
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