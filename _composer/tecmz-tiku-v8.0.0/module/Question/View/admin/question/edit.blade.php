@extends('modstart::admin.dialogFrame')

@section('bodyContent')

    @if($paperUsed)
        <div class="ub-alert ub-alert-danger">
            <i class="iconfont icon-bell"></i>
            该题目已经加入考卷《{{$paperUsed['title'] or ''}}》，修改题目类型、选项个数都可能会造成考卷不能正常考试，请慎重操作。
        </div>
    @endif

    <div class="ub-panel">
        <div class="head">
            <div class="title">{{$pageTitle}}</div>
        </div>
        <div class="body">
            <div id="app"></div>
        </div>
    </div>

@endsection

@section('bodyAppend')
    <script src="@asset('asset/common/editor.js')"></script>
    <script src="@asset('asset/vendor/vue.js')"></script>
    <script src="@asset('asset/vendor/element-ui/index.js')"></script>
    <script>
        window.__data = {
            urlCatAll: "{{modstart_admin_url('question/cat/all')}}",
            urlTagAll: "{{modstart_admin_url('question/tag/all')}}",
            urlChapterAll: "{{modstart_admin_url('question/chapter/all')}}",
            urlUEditorServer: "{{modstart_admin_url('data/ueditor')}}",
            question: {!! json_encode($data) !!},
            QuestionType:{!! json_encode(\ModStart\Core\Type\TypeUtil::dump(\Module\Question\Type\QuestionType::class)) !!}
        };
    </script>
    <script src="@asset('vendor/Question/entry/questionEdit.js')"></script>
@endsection
