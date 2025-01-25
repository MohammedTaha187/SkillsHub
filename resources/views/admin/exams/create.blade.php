@extends("admin.layout")

@section("head")
    Create Exam
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="text-dark">Create New Exam</h2>
                <p class="text-muted">Fill in the details below to add a new exam</p>
            </div>
        </div>

        <div class="card shadow-lg border-light">
            <div class="card-header bg-primary text-white">
                <h5>Create Exam Form</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/exams/store") }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="skill_id" class="form-label">Select Skill</label>
                            <select name="skill_id" id="skill_id"
                                class="form-select @error("skill_id") is-invalid @enderror" required>
                                <option value="">Select Skill</option>
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}"
                                        {{ old("skill_id") == $skill->id ? "selected" : "" }}>
                                        {{ $skill->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error("skill_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name_en" class="form-label">Exam Name (English)</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error("name_en") is-invalid @enderror" value="{{ old("name_en") }}"
                                required>
                            @error("name_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name_ar" class="form-label">Exam Name (Arabic)</label>
                            <input type="text" name="name_ar" id="name_ar"
                                class="form-control @error("name_ar") is-invalid @enderror" value="{{ old("name_ar") }}"
                                required>
                            @error("name_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="desc_en" class="form-label">Description (English)</label>
                            <textarea name="desc_en" id="desc_en" class="form-control @error("desc_en") is-invalid @enderror" required>{{ old("desc_en") }}</textarea>
                            @error("desc_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="desc_ar" class="form-label">Description (Arabic)</label>
                            <textarea name="desc_ar" id="desc_ar" class="form-control @error("desc_ar") is-invalid @enderror" required>{{ old("desc_ar") }}</textarea>
                            @error("desc_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="img" class="form-label">Exam Image</label>
                            <input type="file" name="img" id="img"
                                class="form-control @error("img") is-invalid @enderror" required>
                            @error("img")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="question_no" class="form-label">Number of Questions</label>
                            <input type="number" name="question_no" id="question_no"
                                class="form-control @error("question_no") is-invalid @enderror"
                                value="{{ old("question_no") }}" required>
                            @error("question_no")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="difficulty" class="form-label">Difficulty Level</label>
                            <input type="number" name="difficulty" id="difficulty"
                                class="form-control @error("difficulty") is-invalid @enderror"
                                value="{{ old("difficulty") }}" required>
                            @error("difficulty")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="duration_mins" class="form-label">Duration (Minutes)</label>
                            <input type="number" name="duration_mins" id="duration_mins"
                                class="form-control @error("duration_mins") is-invalid @enderror"
                                value="{{ old("duration_mins") }}" required>
                            @error("duration_mins")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="active" class="form-label">Active Status</label>
                            <select name="active" id="active" class="form-select @error("active") is-invalid @enderror"
                                required>
                                <option value="1" {{ old("active") == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ old("active") == 0 ? "selected" : "" }}>Inactive</option>
                            </select>
                            @error("active")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url("dashboard/exams") }}" class="btn btn-outline-secondary px-4">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Add Exam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
