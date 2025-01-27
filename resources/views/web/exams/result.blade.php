@extends("layout")
@section("title", "Result")
@section("main")
<div class="container text-center mt-5">
    <p>Time Remaining: 
        @if ($timeRemaining > 0)
            {{ floor($timeRemaining / 60) }} minutes and {{ $timeRemaining % 60 }} seconds
        @else
            Time's up!
        @endif
    </p>
    <h1>{{ __("lang.Your Score") }}: {{ $score }}</h1>
    <a href="/" class="btn btn-primary">{{ __("lang.Go Back to Home") }}</a>
</div>
@endsection
