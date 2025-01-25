@extends("admin.layout")

@section("head")
    Create Skills
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="text-dark">Create New Skills</h2>
                <p class="text-muted">Fill in the details below to add a new course skiil</p>
            </div>
        </div>

        <div class="card shadow-lg border-light">
            <div class="card-header bg-primary text-white">
                <h5>Create Skills Form</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/skills/store") }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name_en" class="form-label">Skill Name (English)</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error("name_en") is-invalid @enderror" value="{{ old("name_en") }}"
                                required>
                            @error("name_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name_ar" class="form-label">Skill Name (Arabic)</label>
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
                            <label for="img" class="form-label">Skill Image</label>
                            <input type="file" name="img" id="img"
                                class="form-control @error("image") is-invalid @enderror">
                            @error("image")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="active" class="form-label">Active Status</label>
                            <select name="active" id="active" class="form-select @error("active") is-invalid @enderror">
                                <option value="1" {{ old("active") == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ old("active") == 0 ? "selected" : "" }}>Inactive</option>
                            </select>
                            @error("active")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="cat_id" class="form-label">Parent Category</label>
                            <select name="cat_id" id="cat_id" class="form-select @error("cat_id") is-invalid @enderror">
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}" {{ old("cat_id") == $cat->id ? "selected" : "" }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error("cat_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url("dashboard/skills") }}" class="btn btn-outline-secondary px-4">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
