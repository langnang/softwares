@extends($_viewFrame)

@section('pageTitle'){{modstart_config('siteName').' - '.modstart_config('siteSlogan')}}@endsection

@section('bodyContent')

    <div class="ub-search-block ub-cover" @if(modstart_config('Question_HomeBg')) style="background-image:url({{ \ModStart\Core\Assets\AssetsUtil::fix(modstart_config('Question_HomeBg')) }})" @else style="background-color:var(--color-primary);" @endif>
        <div class="title">
            {{modstart_config('Question_Slogan','海量题库供您搜索')}}
        </div>
        <div class="form">
            <form action="{{modstart_web_url('question/search')}}" method="get">
                <div class="box">
                    <input type="text" name="keywords" class="form form-lg" placeholder="搜索 题目">
                    <button type="submit" class="btn btn-lg"><i class="iconfont icon-search"></i> 搜索</button>
                </div>
            </form>
        </div>
    </div>

    <div class="tw-bg-white tw-pb-2 tw-pt-4">
        <div class="ub-container">
            <div class="tw-flex tw--mx-1 tw-overflow-hidden tw-flex-wrap">
                @foreach(\Module\Question\Util\QuestionCatUtil::allShowing() as $cat)
                    <div class="tw-rounded tw-p-4 tw-flex-grow tw-flex-shrink-0 tw-mx-1 tw-mb-2 ub-cover tw-text-center"
                         style="min-width:7.5rem;background:#f4f8ff;">
                        <a class="tw-block ub-text-default tw-text-lg hover:tw-text-white" href="{{modstart_web_url('question/cat/'.$cat['id'])}}"><i class="iconfont icon-book"></i> {{$cat['title']}}</a>
                        <div class="ub-text-primary">{{$cat['questionCount']?$cat['questionCount']:0}}题</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="ub-container margin-top">
        <div class="row">
            <div class="col-md-9">
                @foreach(\Module\Question\Util\QuestionCatUtil::allShowing() as $cat)
                    <div class="ub-panel">
                        <div class="head">
                            <div class="more">
                                <a class="ub-text-muted" href="{{modstart_web_url('question/cat/'.$cat['id'])}}">
                                    更多&gt;&gt;
                                </a>
                            </div>
                            <div class="title">
                                <a class="tw-inline-block ub-text-primary" href="{{modstart_web_url('question/cat/'.$cat['id'])}}">
                                    <i class="iconfont icon-book"></i>
                                    {{$cat['title']}}
                                </a>
                            </div>
                        </div>
                        <div class="body">
                            @include('module::Question.View.inc.questionRecords',['records'=>\Module\Question\Util\QuestionUtil::listLatestQuestion($cat['id'])])
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                @if(\ModStart\Module\ModuleManager::isModuleEnabled('Banner'))
                    @include('module::Banner.View.pc.public.banner',['position'=>'questionHome'])
                @endif
                @if(modstart_module_enabled('News'))
                    {!! \Module\News\View\Render::latest() !!}
                @endif
                @if(modstart_module_enabled('VipArticle'))
                    {!! \Module\VipArticle\View\Render::latest() !!}
                @endif
            </div>
        </div>
        @if(\ModStart\Module\ModuleManager::isModuleEnabled('Partner'))
            @include('module::Partner.View.pc.public.partner',['position'=>'questionHome'])
        @endif
    </div>

@endsection
