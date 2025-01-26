@extends("admin.layout")

@section("title")
    Admin Panel
@endsection

@section("body")
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <img src="{{ asset("admin/img/logo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset("admin/img/user-profile.jpg") }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ url("dashboard/categories") }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ url('dashboard/categories') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url("dashboard/skills") }}" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Skills</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url("dashboard/exams") }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Exams</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("dashboard/questions") }}" class="nav-link" onclick="showSection('questions')">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>Questions</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url("dashboard/users") }}" class="nav-link" onclick="showSection('users')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center mb-4">Users</h3>
                            
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role ? $user->role->name : 'N/A' }}</td> <!-- Check if role exists -->
                                            <td>
                                                <a href="{{ url('dashboard/users/edit/' . $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url('dashboard/users/delete/' . $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

   

    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <script>
        function showSection(section) {
    var sections = document.querySelectorAll('.section');
    sections.forEach(function(sec) {
        sec.style.display = 'none';
    });

    document.getElementById(section).style.display = 'block';
}

window.onload = function() {
    showSection('users'); 
};

    </script>
@endsection
