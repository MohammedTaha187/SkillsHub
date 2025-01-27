@extends("layout")
@section("title", "Questions")
@section("main")
    <div class="hero-area section">
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset("./img/blog-post-background.jpg") }})">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">{{ __("lang.home") }}</a></li>
                        <li><a href="{{ url("/categories/show/" . $exam->skill->cat->id) }}">{{ $exam->skill->cat->name() }}</a></li>
                        <li>{{ $exam->name() }}</li>
                    </ul>
                    <h1 class="white-text">{{ $exam->name() }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div id="blog" class="section">
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-9">
                    @if($timeRemaining > 0)
                    <div class="alert alert-success text-center">
                        <strong>Time Remaining:</strong>
                        <span class="countdown-time" id="timeRemaining">{{ floor($timeRemaining / 60) }} minutes and {{ $timeRemaining % 60 }} seconds</span>
                    </div>
                    <button type="submit" class="main-button icon-button pull-left" id="submitButton">{{ __("lang.Submit") }}</button>
                @else
                    <div class="alert alert-danger text-center">
                        <strong>Time's up!</strong>
                    </div>
                @endif

                    <form action="{{ route("exams.submit", $exam->id) }}" method="POST" id="examForm">
                        @csrf
                        @foreach ($questions as $index => $question)
                            <div class="blog-post mb-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            {{ $question->title->{app()->getLocale()} }}
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach (range(1, 4) as $i)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="question[{{ $question->id }}]" value="{{ $i }}" class="questionAnswer">
                                                    {{ $question->{"option_" . $i}->{app()->getLocale()} }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="main-button icon-button pull-left" id="submitButton" disabled>{{ __("lang.Submit") }}</button>
                    </form>
                </div>
                <div id="aside" class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ __("lang.Skill") }}: {{ $exam->skill->name() }}</li>
                        <li class="list-group-item">{{ __("lang.Questions") }}: {{ $exam->questions->count() }}</li>
                        <li class="list-group-item">{{ __("lang.Duration") }}: {{ $exam->duration_mins }} mins</li>
                        <li class="list-group-item">{{ __("lang.Difficulty") }}:
                            @for ($i = 1; $i <= $exam->difficulty; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        var timeRemaining = {{ $timeRemaining }};
        var countdownInterval = setInterval(function() {
            if (timeRemaining <= 0) {
                clearInterval(countdownInterval);
                document.getElementById('submitButton').disabled = false; // Enable submit button when time is up
                document.getElementById('timeRemaining').innerText = "Time's up!";
            } else {
                timeRemaining--;
                var minutes = Math.floor(timeRemaining / 60);
                var seconds = timeRemaining % 60;
                document.getElementById('timeRemaining').innerText = minutes + " minutes and " + seconds + " seconds";
            }
        }, 1000);
    </script>
    @endsection
@endsection
