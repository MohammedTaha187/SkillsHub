@extends("layout")
@section("title")
    Categories
@endsection
@section("main")
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image: url({{ asset("img/page-background.jpg") }});">
        </div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">{{ __("lang.home") }}</a></li>
                        <li>{{ $cat->name() }}</li>
                    </ul>
                    <h1 class="white-text">{{ $cat->name() }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <!-- #region -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- row -->
                    <div class="row">

                        <!-- single skill -->
                        @foreach ($skills as $skill)
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ url("skills/show/$skill->id") }}">
                                            <img src="{{ asset("uploads/$skill->img") }}" alt="">
                                        </a>
                                    </div>
                                    <h4><a href="{{ url("skills/show/$skill->id") }}">{{ $skill->name() }}</a></h4>
                                    <div class="blog-meta">
                                        <span>{{ Carbon\Carbon::parse($skill->created_at)->format("d M, Y ") }}</span><!--18 Oct, 2017-->
                                        <div class="pull-right">
                                            <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>
                                                    {{ $skill->getStudentCount() }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- /single skill -->

                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        {{ $skills->links("web.inc.paginator") }}
                        <!-- pagination -->

                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>{{ __("lang.categories") }}</h3>
                        @foreach ($cats as $cat)
                            <a class="category" href="{{ url("skills/show/$skill->id") }}">{{ $cat->name() }}
                                <span>{{ $cat->skills()->count() }}</span></a>
                        @endforeach

                    </div>
                    <!-- /category widget -->
                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
