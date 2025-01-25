@extends("admin.layout")

@section("head")
    Edit Category
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="text-dark"> Edit New Skills</h2>
                <p class="text-muted">Fill in the details below to edit a new course skiil</p>
            </div>
        </div>

        <div class="card shadow-lg border-light">
            <div class="card-header bg-primary text-white">
                <h5>Edit Course Category</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/skills/update/$skill->id") }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name_en" class="form-label">Skill Name (English)</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error("name_en") is-invalid @enderror"
                                value="{{ old("name_en", $skill->name->en) }}" required>
                            @error("name_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name_ar" class="form-label">Skill Name (Arabic)</label>
                            <input type="text" name="name_ar" id="name_ar"
                                class="form-control @error("name_ar") is-invalid @enderror"
                                value="{{ old("name_ar", $skill->name->ar) }}" required>
                            @error("name_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cat_id" class="form-label">Parent Category</label>
                            <select name="cat_id" id="cat_id" class="form-select @error("cat_id") is-invalid @enderror"
                                required>
                                <option value="{{ $cat->id }}" selected>{{ json_decode($cat->name)->en }}</option>
                            </select>
                            @error("cat_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="active" class="form-label">Status</label>
                            <select name="active" id="active" class="form-select @error("active") is-invalid @enderror"
                                required>
                                <option value="1" {{ old("active", $skill->active) == 1 ? "selected" : "" }}>Active
                                </option>
                                <option value="0" {{ old("active", $skill->active) == 0 ? "selected" : "" }}>Inactive
                                </option>
                            </select>
                            @error("active")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" name="img" id="img"
                                class="form-control @error("img") is-invalid @enderror">
                            @error("img")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($skill->img)
                                <img src="{{ asset("uploads/" . $skill->img) }}" alt="Skill Image"
                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url("dashboard/skills") }}" class="btn btn-outline-secondary px-4">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Update Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
