@extends('admin.public.layout')

@section('style')
    <style>
        .custom-style {

        }
        .radio{
            display: inline-block;
            position: relative;
            line-height: 18px;
            margin: 10px 50px;
            cursor: pointer;
        }
        .radio input{
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
        }
        .radio .radio-bg{
            display: inline-block;
            height: 18px;
            width: 18px;
            margin-right: 5px;
            padding: 0;
            background-color: #45bcb8;
            border-radius: 100%;
            vertical-align: top;
            box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1) inset, 0 1px 4px rgba(0, 0, 0, 0.1) inset, 1px -1px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .radio .radio-on{
            display: none;
        }
        .radio input:checked + span.radio-on{
            width: 10px;
            height: 10px;
            position: absolute;
            border-radius: 100%;
            background: #FFFFFF;
            top: 4px;
            left: 4px;
            box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.3), 0 0 1px rgba(255, 255, 255, 0.4) inset;
            background-image: linear-gradient(#ffffff 0, #e7e7e7 100%);
            transform: scale(0, 0);
            transition: all 0.2s ease;
            transform: scale(1, 1);
            display: inline-block;
        }
    </style>
@endsection


@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                        {{ $position_name }}菜单列表
                    </div>
                    <div class="layui-card-body">
                        <div style="padding-bottom: 10px;">
                            <button class="layui-btn" layadmin-event="add">添加菜单</button>
                        </div>
                        <table class="layui-hide" id="list-table" lay-filter="list-table"></table>
                        <script type="text/html" id="list-table-bar">
                            <a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        layui.use(['layer', 'table', 'form'], function(){
            var $ = layui.$;
            var form = layui.form;
            // 新增一个新增设备事件
            clickMethod.add = function () {
                layer.open({
                    type: 2
                    ,title: '添加菜单'
                    ,shadeClose: true
                    ,area: ["550px", "550px"]
                    ,content: './edit/0'
                    ,end: function () {
                        location.reload(); // 渲染表格
                    }
                })
            };

            var table = layui.table;
            function tablerender(){
                table.render({
                    elem: '#list-table'
                    ,url: './{{ $position }}'
                    ,page: true
                    ,limit: 30
                    ,where: {
                        time: Date.now()
                    }
                    ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                    ,cols: [[
                        {field:'id', width:80, title: 'ID'}
                        ,{field:'pid', width:80, title: '父级ID'}
                        ,{field:'type', width:100, title: '类型'}
                        ,{field:'title', width:150, title: '标题'}
                        ,{field:'url', width:300, title: 'url'}
                        ,{field:'sort', width:80, title: '排序'}
                        ,{field:'activate', width:100, title: '默认首页'}
                        ,{field:'status', width:100, title: '是否显示'}
                        ,{field:'updated_at', width:180, title: '更新时间'}
                        ,{field:'created_at', width:180, title: '创建时间'}
                        ,{title:"操作", width:250, align:"center", fixed:"right", toolbar:"#list-table-bar"}
                    ]]
                });
            };
            tablerender();  // 渲染表格
            table.on('tool(list-table)', function(obj){
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                var tr = obj.tr; //获得当前行 tr 的DOM对象

                if(layEvent === 'edit'){
                    layer.open({
                        type: 2
                        ,title: '编辑菜单'
                        ,shadeClose: true
                        ,area: ["550px", "550px"]
                        ,content: './edit/'+data.id
                        ,end: function () { // 层被关闭，重新渲染
                            tablerender();
                        }
                    });
                } else if(layEvent === 'del'){ //删除
                    layer.confirm('真的删除这个菜单吗？', function(index){
                        //向服务端发送删除指令
                        $.ajax({
                            url: "./del/"+data.id
                            ,type: "GET"
                            ,dataType: "json"
                            ,success: function (data) {
                                if(data.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    layer.msg('删除成功！', {icon: 1});
                                    tablerender();
                                }else{
                                    layer.msg(data.msg)
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection