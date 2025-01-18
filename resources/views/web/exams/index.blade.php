@extends('layout')
@section('title')
exams
@endsection
@section('main')
<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/blog-post-background.jpg')}})"></div>
			<!-- /Backgound Image -->



			
			
			
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="/">{{__('lang.home')}}</a></li>
							<li><a href="{{ url('/categories/show/' . $exams->skill->cat->id) }}">{{$exams->skill->cat->name()}}</a></li>
							<li><a href="{{ url('/categories/show/' . $exams->skill->cat->id) }}">{{$exams->skill->name()}}</a></li>
							<li>{{$exams->name()}}</li>
						</ul>
						<h1 class="white-text">{{$exams->name()}}</h1>
						<ul class="blog-post-meta">
							<li>{{Carbon\Carbon::parse($exams->created_at)->format('d M, Y ')}}</li>
							<li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$exams->skill->getStudentCount()}}</a></li>

						</ul>
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
				<div class="row">

					<!-- main blog -->
					
					
					
					<div id="main" class="col-md-9">
						<!-- blog post -->
						<div class="blog-post mb-5">
							<p>{{$exams->desc()}}</p>       
						</div>
						<!-- /blog post -->

                        <div>
							<div>
								<a href="{{ url('/exams/questions/'.$exams->id) }}" class="main-button icon-button pull-left"> {{__('lang.start_exam')}}</a>
							</div>
							

                        </div>
					</div>
					<!-- /main blog -->
                    
					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- exams details widget -->
						<ul class="list-group">
							<li class="list-group-item">{{__('lang.Skill')}}: {{$exams->skill->name()}} </li>
							<li class="list-group-item"> {{__('lang.Questions')}}: {{$exams->questions->count()}}</li>
							<li class="list-group-item"> {{__('lang.Duration')}}: {{$exams->duration_mins}} mins</li>
							<li class="list-group-item"> {{__('lang.Difficulty')}}: 
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
							</li>
						</ul>
						<!-- /exams details widget -->

						

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->
        @endsection