@extends("admin.layout")

@section("head")
    Update Question
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center text-dark">Update Question</h2>
            </div>
        </div>

        <div class="card shadow-sm border-light">
            <div class="card-header bg-light text-dark">
                <h5 class="mb-0">Update Question Form</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/questions/update/$question->id") }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="exam_id" class="form-label fw-bold">Exam</label>
                        <select name="exam_id" id="exam_id" class="form-control @error("exam_id") is-invalid @enderror"
                            required>
                            <option value="">Select Exam</option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}"
                                    {{ old("exam_id", $question->exam_id) == $exam->id ? "selected" : "" }}>
                                    {{ $exam->name->en }} / {{ $exam->name->ar }}
                                </option>
                            @endforeach
                        </select>
                        @error("exam_id")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title_ar" class="form-label fw-bold">Question Title (Arabic)</label>
                            <input type="text" name="title_ar" id="title_ar"
                                class="form-control @error("title_ar") is-invalid @enderror"
                                value="{{ old("title_ar", $question->title->ar ?? "") }}" required>
                            @error("title_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="title_en" class="form-label fw-bold">Question Title (English)</label>
                            <input type="text" name="title_en" id="title_en"
                                class="form-control @error("title_en") is-invalid @enderror"
                                value="{{ old("title_en", $question->title->en ?? "") }}" required>
                            @error("title_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @for ($i = 1; $i <= 4; $i++)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="option_{{ $i }}_ar" class="form-label fw-bold">Option
                                    {{ $i }} (Arabic)</label>
                                <input type="text" name="option_{{ $i }}_ar"
                                    id="option_{{ $i }}_ar"
                                    class="form-control @error("option_" . $i . "_ar") is-invalid @enderror"
                                    value="{{ old("option_" . $i . "_ar", $question->{"option_" . $i}->ar ?? "") }}"
                                    required>
                                @error("option_" . $i . "_ar")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="option_{{ $i }}_en" class="form-label fw-bold">Option
                                    {{ $i }} (English)</label>
                                <input type="text" name="option_{{ $i }}_en"
                                    id="option_{{ $i }}_en"
                                    class="form-control @error("option_" . $i . "_en") is-invalid @enderror"
                                    value="{{ old("option_" . $i . "_en", $question->{"option_" . $i}->en ?? "") }}"
                                    required>
                                @error("option_" . $i . "_en")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor

                    <div class="mb-4">
                        <label for="right_ans" class="form-label fw-bold">Right Answer</label>
                        <select name="right_ans" id="right_ans"
                            class="form-control @error("right_ans") is-invalid @enderror" required>
                            <option value="">Select Right Answer</option>
                            <option value="1"
                                {{ old("right_ans", $question->right_ans ?? "") == "1" ? "selected" : "" }}>Option 1
                            </option>
                            <option value="2"
                                {{ old("right_ans", $question->right_ans ?? "") == "2" ? "selected" : "" }}>Option 2
                            </option>
                            <option value="3"
                                {{ old("right_ans", $question->right_ans ?? "") == "3" ? "selected" : "" }}>Option 3
                            </option>
                            <option value="4"
                                {{ old("right_ans", $question->right_ans ?? "") == "4" ? "selected" : "" }}>Option 4
                            </option>
                        </select>
                        @error("right_ans")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary w-100">Update Question</button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ url("dashboard/questions") }}" class="btn btn-outline-secondary w-100">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
