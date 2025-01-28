@extends("layout")
@section("title", "Questions")
@section("main")
    <div class="hero-area section">
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('./img/blog-post-background.jpg') }})">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">{{ __("lang.home") }}</a></li>
                        <li><a href="{{ url('/categories/show/' . $exam->skill->cat->id) }}">{{ $exam->skill->cat->name() }}</a></li>
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
                    <form action="{{ route('exams.submit', $exam->id) }}" method="POST" id="examForm">
                        @csrf
                        @php
                            $elapsedTime = now()->diffInSeconds($start_time);
                            $remainingTime = max(0, $duration * 60 - $elapsedTime);
                        @endphp

<div id="timer" style="font-size: 24px; font-weight: bold; color: #e74c3c; text-align: center; background-color: #f8d7da; padding: 10px; border-radius: 5px; display: inline-block;">
    <span id="timeLabel" style="font-size: 18px; color: #333;">{{__ ("lang.Remaining Time") }}:</span>
    <span id="minutes" style="font-size: 30px; color: #e74c3c;">{{ floor($remainingTime / 60) }}</span> {{ __("lang.minutes and") }}
    <span id="seconds" style="font-size: 30px; color: #e74c3c;">{{ $remainingTime % 60 }}</span> {{ __("lang.seconds") }}
</div>


                        @foreach ($questions as $index => $question)
                            <div class="blog-post mb-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $question->title->{app()->getLocale()} }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach (range(1, 4) as $i)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="question[{{ $question->id }}]"
                                                           value="{{ $i }}" class="questionAnswer"
                                                           {{ session("answer_$question->id") == $i ? 'checked' : '' }}
                                                           {{ session("answer_$question->id") ? 'disabled' : '' }}>
                                                    {{ $question->{"option_" . $i}->{app()->getLocale()} }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="main-button icon-button pull-left" id="submitButton" disabled>
                            {{ __("lang.Submit") }}
                        </button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timerElement = document.getElementById('timer');
            const submitButton = document.getElementById('submitButton'); 
    
         
            const isTimeHidden = localStorage.getItem('isTimeHidden') === 'true';
    
            if (isTimeHidden) {
          
                timerElement.style.display = 'none';
            }
    
            let remainingTime = {{ $remainingTime }}; 
    
            const countdown = setInterval(function () {
                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
    
                timerElement.textContent = `وقت متبقي: ${minutes} دقيقة و ${seconds < 10 ? '0' + seconds : seconds} ثانية`;
    
                remainingTime--;
    
                if (remainingTime < 0) {
                    clearInterval(countdown);
                    alert('انتهى الوقت! سيتم إرسال الامتحان تلقائيًا...');
                    document.getElementById('examForm').submit(); 
                }
    
                localStorage.setItem('remainingTime', remainingTime);
            }, 1000);
    
            submitButton.addEventListener('click', function(event) {
                clearInterval(countdown);
                document.getElementById('examForm').submit(); 
    
                timerElement.style.display = 'none';
                localStorage.setItem('isTimeHidden', 'true');
            });
    
            const questions = document.querySelectorAll('.questionAnswer');
            const answeredQuestions = {};
    
            questions.forEach(question => {
                question.addEventListener('change', function() {
                    const questionId = this.name;
                    answeredQuestions[questionId] = true;
    
                    if (Object.keys(answeredQuestions).length === {{ $questions->count() }}) {
                        submitButton.disabled = false; 
                    } else {
                        submitButton.disabled = true; 
                    }
                });
            });
        });
    </script>
    
@endsection
