@extends("admin.layout")

@section("head")
    Edit User Role
@endsection

@section("body")
    @include("admin.success")

    <div class="container mt-5">
        @include("admin.errors")

        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center text-dark">Edit User Role</h2>
            </div>
        </div>

        <div class="card shadow-sm border-light">
            <div class="card-header bg-light text-dark">
                <h5>Edit User Role</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("dashboard/users/update/$user->id") }}">
                    @csrf
                    @method('POST')

                    <div class="mb-4">
                        <label for="role_id" class="form-label fw-bold">Role</label>
                        <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('dashboard/users') }}" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
