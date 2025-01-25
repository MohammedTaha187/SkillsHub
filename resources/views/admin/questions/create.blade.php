@extends("admin.layout")

@section("head")
    Create Question
@endsection

@section("body")
    @include("admin.success")
    @include("admin.errors")

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center text-dark">Create New Question</h2>
            </div>
        </div>

        <div class="card shadow-sm border-light">
            <div class="card-header bg-light text-dark">
                <h5>Create Question Form</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/questions/store") }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="exam_id" class="form-label">Exam</label>
                            <select name="exam_id" id="exam_id"
                                class="form-control @error("exam_id") is-invalid @enderror" required>
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}" {{ old("exam_id") == $exam->id ? "selected" : "" }}>
                                        {{ $exam->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error("exam_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="title_ar" class="form-label">Question Title (Arabic)</label>
                            <input type="text" name="title_ar" id="title_ar"
                                class="form-control @error("title_ar") is-invalid @enderror" value="{{ old("title_ar") }}"
                                required>
                            @error("title_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="title_en" class="form-label">Question Title (English)</label>
                            <input type="text" name="title_en" id="title_en"
                                class="form-control @error("title_en") is-invalid @enderror" value="{{ old("title_en") }}"
                                required>
                            @error("title_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="option_1_ar" class="form-label">Option 1 (Arabic)</label>
                            <input type="text" name="option_1_ar" id="option_1_ar"
                                class="form-control @error("option_1_ar") is-invalid @enderror"
                                value="{{ old("option_1_ar") }}" required>
                            @error("option_1_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="option_1_en" class="form-label">Option 1 (English)</label>
                            <input type="text" name="option_1_en" id="option_1_en"
                                class="form-control @error("option_1_en") is-invalid @enderror"
                                value="{{ old("option_1_en") }}" required>
                            @error("option_1_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="option_2_ar" class="form-label">Option 2 (Arabic)</label>
                            <input type="text" name="option_2_ar" id="option_2_ar"
                                class="form-control @error("option_2_ar") is-invalid @enderror"
                                value="{{ old("option_2_ar") }}" required>
                            @error("option_2_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="option_2_en" class="form-label">Option 2 (English)</label>
                            <input type="text" name="option_2_en" id="option_2_en"
                                class="form-control @error("option_2_en") is-invalid @enderror"
                                value="{{ old("option_2_en") }}" required>
                            @error("option_2_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="option_3_ar" class="form-label">Option 3 (Arabic)</label>
                            <input type="text" name="option_3_ar" id="option_3_ar"
                                class="form-control @error("option_3_ar") is-invalid @enderror"
                                value="{{ old("option_3_ar") }}" required>
                            @error("option_3_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="option_3_en" class="form-label">Option 3 (English)</label>
                            <input type="text" name="option_3_en" id="option_3_en"
                                class="form-control @error("option_3_en") is-invalid @enderror"
                                value="{{ old("option_3_en") }}" required>
                            @error("option_3_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="option_4_ar" class="form-label">Option 4 (Arabic)</label>
                            <input type="text" name="option_4_ar" id="option_4_ar"
                                class="form-control @error("option_4_ar") is-invalid @enderror"
                                value="{{ old("option_4_ar") }}" required>
                            @error("option_4_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="option_4_en" class="form-label">Option 4 (English)</label>
                            <input type="text" name="option_4_en" id="option_4_en"
                                class="form-control @error("option_4_en") is-invalid @enderror"
                                value="{{ old("option_4_en") }}" required>
                            @error("option_4_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="right_ans" class="form-label">Right Answer (Select Option)</label>
                        <select name="right_ans" id="right_ans"
                            class="form-control @error("right_ans") is-invalid @enderror" required>
                            <option value="">Select Right Answer</option>
                            <option value="1" {{ old("right_ans") == "1" ? "selected" : "" }}>Option 1</option>
                            <option value="2" {{ old("right_ans") == "2" ? "selected" : "" }}>Option 2</option>
                            <option value="3" {{ old("right_ans") == "3" ? "selected" : "" }}>Option 3</option>
                            <option value="4" {{ old("right_ans") == "4" ? "selected" : "" }}>Option 4</option>
                        </select>
                        @error("right_ans")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url("dashboard/questions") }}" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Add Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
