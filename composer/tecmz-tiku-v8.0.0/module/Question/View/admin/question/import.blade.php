@extends('modstart::admin.frame')

@section($_tabSectionName)

    <div class="ub-panel">
        <div class="head">
            <div class="title">{{$pageTitle}}</div>
        </div>
        <div class="body">
            <div id="app"></div>
        </div>
    </div>

    <div class="content-fixed-bottom-toolbox-placeholder"></div>

@endsection

@section('bodyAppend')
    <script src="@asset('asset/vendor/vue.js')"></script>
    <script src="@asset('asset/vendor/element-ui/index.js')"></script>
    <script>
        window.__data = {}
    </script>
    <script src="@asset('vendor/Question/entry/questionImport.js')"></script>
@endsection
