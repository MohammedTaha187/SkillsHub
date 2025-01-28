@extends("layout")
@section("title", "Result")
@section("main")
<div class="container text-center mt-5">
    
    <h1>{{ __("lang.Your Score") }}: {{ $score }}</h1>
    <a href="javascript:history.back()" class="btn btn-primary">{{ __("lang.Go Back to Home") }}</a>

</div>
@endsection
