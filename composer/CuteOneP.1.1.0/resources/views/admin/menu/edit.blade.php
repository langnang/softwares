<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
<link rel="stylesheet" href="/layui/rc/css/layui.css" media="all">
<link rel="stylesheet" href="/css/admin.css" media="all">

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
            <label class="layui-form-label">url</label>
            <div class="layui-input-block">
                <input type="text" name="url" value="{{ $data['url'] }}" placeholder="URL" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div class="layui-input-block">
                <select name="type" placeholder="请选择类型" lay-filter="typetype">
                    <option value="0" @if ($data['type'] == 0) selected @endif>自定义</option>
                    <option value="1" @if ($data['type'] == 1) selected @endif>网盘</option>
                    <option value="2" @if ($data['type'] == 2) selected @endif>模型</option>
                    <option value="3" @if ($data['type'] == 3) selected @endif>插件</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">位置</label>
            <div class="layui-input-block">
                <select name="position" placeholder="请选择位置" lay-filter="typetype">
                    <option value="0" @if ($data['position'] == 0) selected @endif>前台</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">打开方式</label>
            <div class="layui-input-block">
                <select name="target" placeholder="请选择打开方式" lay-filter="typetype">
                    <option value="0" @if ($data['target'] == 0) selected @endif>当前窗口打开</option>
                    <option value="1" @if ($data['target'] == 1) selected @endif>新窗口打开</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="sort" value="{{ $data['sort'] }}" placeholder="排序，序号越大越靠前" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">默认首页</label>
            <div class="layui-input-block">
                <input type="checkbox" name="activate" lay-skin="switch" lay-text="是|否" {% if data.activate==1 %}checked{% endif %}>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否显示</label>
            <div class="layui-input-block">
                <input type="checkbox" name="status" lay-skin="switch" lay-text="是|否" {% if data.status==1 %}checked{% endif %}>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline">
                <button id="form-submit" class="layui-btn">保存</button>
            </div>
        </div>
    </form>
</div>

<script type="application/javascript" src="/layui/layui.js"></script>
<script>
    layui.use(['form', 'layer'], function(){
        var $ = layui.$; //重点处
        var form = layui.form;

        // 确认按钮
        $('#form-submit').on('click', function () {
            $.ajax({
                url: "./{{ $data['id'] }}"
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