@extends("layout")
@section("title")
    Home page
@endsection

@section("main")
    <!-- Home -->
    <div id="home" class="hero-area">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset("./img/home-background.jpg") }})">
        </div>
        <!-- /Backgound Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text"> {{ __("lang.SkillsHub Free Online Skill Assessment") }}</h1>
                        <p class="lead white-text">
                            {{ __("lang.Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.") }}
                        </p>
                        <a class="main-button icon-button" href="#">{{ __("lang.Get Started!") }}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Home -->

    <!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>{{ __("lang.Popular Exams") }}</h2>
                    <p class="lead">{{ __("lang.Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.") }}</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam1.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title"
                                href="#">{{ __("lang.Beginner to Pro in Excel: Financial Modeling and Valuation") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Design") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam2.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{ __("lang.Introduction to CSS") }} </a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Programming") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam3.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title"
                                href="#">{{ __("lang.The Ultimate Drawing Course | From Beginner To Advanced") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Drawing") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam4.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{ __("lang.The Complete Web Development Course") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Web Development") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam5.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{ __("lang.PHP Tips, Tricks, and Techniques") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Web Development") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam6.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title"
                                href="#">{{ __("lang.All You Need To Know About Programming") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Programming") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam7.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{ __("lang.How to Get Started in Photography") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Photography") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="#" class="course-img">
                                <img src="{{ asset("./img/exam8.jpg") }}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="#">{{ __("lang.Typography From A to Z") }}</a>
                            <div class="course-details">
                                <span class="course-category">{{ __("lang.Typography") }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /single course -->

                </div>
                <!-- /row -->

            </div>
            <!-- /courses -->

            <div class="row">
                <div class="center-btn">
                    <a class="main-button icon-button" href="#">{{ __("lang.More Courses") }}</a>
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->

    <!-- Contact CTA -->
    <div id="contact-cta" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset("./img/cta.jpg") }})"></div>
        <!-- Backgound Image -->

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">{{ __("lang.Contact Us") }}</h2>
                    <p class="lead white-text">
                        {{ __("lang.Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.") }}</p>
                    <a class="main-button icon-button" href="contact.html">{{ __("lang.Contact Us Now") }}</a>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact CTA -->
@endsection
