@extends('admin.public.layout')

@section('style')
@endsection


@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">系统设置</div>
                    <div class="layui-card-body">
                        <form class="layui-form" id="form1" onsubmit="return false" action="##" method="post">
                            {{ csrf_field() }}
                            <div class="layui-form-item">
                                <label class="layui-form-label">用户名</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="username" value="{{ $data['username'] }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">后台管理员账号</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="password" value="" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">后台管理员密码(留空则不修改)</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">站点状态</label>
                                <div class="layui-input-inline">
                                    <input type="checkbox" name="toggle_web_site" lay-text="开启|关闭" @if ($data['toggle_web_site']=="1") checked @endif lay-skin="switch">
                                </div>
                                <div class="layui-form-mid layui-word-aux">关闭/开启站点</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">LOGO</label>
                                <div class="layui-input-inline" style="width: 330px;">
                                    <input type="text" name="web_site_logo" value="{{ $data['web_site_logo'] }}" id="web_site_logo" class="layui-input">
                                    <img class="layui-upload-img" id="upload-normal-img" style="width: 200px;height: 160px;" src="{{ $data['web_site_logo'] }}">
                                    <button type="button" class="layui-btn" id="upload">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                </div>
                                <div class="layui-form-mid layui-word-aux">LOGO</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站地址</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <input type="text" name="web_site" value="{{ $data['web_site'] }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">例：http://www.baidu.com/ 切记要用斜杠结尾</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站标题</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <input type="text" name="web_site_title" value="{{ $data['web_site_title'] }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">网站标题</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">SEO描述</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <textarea name="web_site_description" placeholder="" class="layui-textarea">{{ $data['web_site_description'] }}</textarea>
                                </div>
                                <div class="layui-form-mid layui-word-aux">SEO描述</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">SEO关键字</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <textarea name="web_site_keyword" placeholder="" class="layui-textarea">{{ $data['web_site_keyword'] }}</textarea>
                                </div>
                                <div class="layui-form-mid layui-word-aux">SEO关键字</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">版权信息</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <input type="text" name="web_site_copyright" value="{{ $data['web_site_copyright'] }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">版权信息</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站备案号</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <input type="text" name="web_site_icp" value="{{ $data['web_site_icp'] }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">网站备案号</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">站点统计</label>
                                <div class="layui-input-inline" style="width: 500px;">
                                    <textarea name="web_site_statistics" placeholder="" class="layui-textarea">{{ $data['web_site_statistics'] }}</textarea>
                                </div>
                                <div class="layui-form-mid layui-word-aux">站点统计</div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <div class="layui-footer">
                                        <button id="form-submit" class="layui-btn">保存</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        layui.use(['form', 'layer', 'upload'], function(){
            var $ = layui.$; //重点处
            var form = layui.form;
            var upload = layui.upload;
            upload.render({
                elem: '#upload'
                ,url: './upload'
                ,data: {
                    '_token': "{{ csrf_token() }}"
                }
                ,done: function(res, index, upload){
                    console.log(res)
                    if(res.code == 0){
                        $("#web_site_logo").val(res.data.src);
                        $("#upload-normal-img").attr("src", res.data.src);
                    }
                }
                ,accept: 'images'
                ,acceptMime: 'image/*'
            });

            // 确认按钮
            $('#form-submit').on('click', function () {
                $.ajax({
                    url: "./setting"
                    ,type: "POST"
                    ,dataType: "json"
                    ,data: $('#form1').serialize()
                    ,success: function (data) {
                        if(!data.code){
                            layer.msg(data.msg, {
                                icon: 1
                                ,shade: 0.3
                                ,shadeClose: false
                                ,time: 1000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                location.reload();  // 刷新当前页
                            });
                        }else{
                            layer.msg(data.msg)
                        }
                    }
                });

            });
        });
    </script>
@endsection