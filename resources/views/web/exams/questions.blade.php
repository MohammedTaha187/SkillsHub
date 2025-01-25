@extends("layout")
@section("title")
    Questions
@endsection
@section("main")
    <!-- Hero-area -->
    <div class="hero-area section">
        <!-- Background Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('img/blog-post-background.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">{{ __("lang.home") }}</a></li>
                        <li><a href="{{ url("/categories/show/" . $exam->skill->cat->id) }}">{{ $exam->skill->cat->name() }}</a></li>
                        <li><a href="{{ url("/categories/show/" . $exam->skill->cat->id) }}">{{ $exam->skill->name() }}</a></li>
                        <li>{{ $exam->name() }}</li>
                    </ul>
                    <h1 class="white-text">{{ $exam->name() }}</h1>
                    <ul class="blog-post-meta">
                        <li>{{ Carbon\Carbon::parse($exam->created_at)->format("d M, Y ") }}</li>
                        <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>{{ $exam->skill->getStudentCount() }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">
        <div class="container">
            <div class="row">
                <!-- main blog -->
                <div id="main" class="col-md-9">
                    <form action="">
                        @csrf
                        @foreach ($questions as $index => $question)
                            <div class="blog-post mb-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $index + 1 }}- {{ $question->title->en }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach (['option_1', 'option_2', 'option_3', 'option_4'] as $option)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="question[{{ $question->id }}]" id="optionsRadios{{ $question->id . $loop->index }}" value="{{ $option }}">
                                                    {{ is_object($question->$option) ? $question->$option->en : $question->$option }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>
                    <div>
                        <button class="main-button icon-button pull-left">{{ __("lang.Submit") }}</button>
                        <button class="main-button icon-button btn-danger pull-left ml-sm">{{ __("lang.Cancel") }}</button>
                    </div>
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ __("lang.Skill") }}: {{ $exam->skill->name() }} </li>
                        <li class="list-group-item">{{ __("lang.Questions") }}: {{ $exam->questions->count() }}</li>
                        <li class="list-group-item">{{ __("lang.Duration") }}: {{ $exam->duration_mins }} mins</li>
                        <li class="list-group-item">{{ __("lang.Difficulty") }}:
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                </div>
                <!-- /aside blog -->
            </div>
        </div>
    </div>
    <!-- /Blog -->
@endsection
