@extends("admin.layout")

@section("head")
    Edit Category
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center text-dark">Edit Category</h2>
            </div>
        </div>

        <div class="card shadow-sm border-light">
            <div class="card-header bg-light text-dark">
                <h5>Edit Course Category</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/categories/update/$cat->id") }}">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="name_en" class="form-label">Category Name (English)</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error("name_en") is-invalid @enderror"
                                value="{{ old("name_en", $cat->name->en) }}" required>
                            @error("name_en")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name_ar" class="form-label">Category Name (Arabic)</label>
                            <input type="text" name="name_ar" id="name_ar"
                                class="form-control @error("name_ar") is-invalid @enderror"
                                value="{{ old("name_ar", $cat->name->ar) }}" required>
                            @error("name_ar")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ url("dashboard/categories") }}" class="btn btn-outline-secondary">Back</a>

                        <button type="submit" class="btn btn-primary px-4">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
