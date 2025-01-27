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
                    <a href="{{ url("dashboard/exams") }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </button>
                        </form>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ url("dashboard/categories") }}" class="nav-link">
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
                        <a href="javascript:void(0);" class="nav-link" onclick="showSection('exams')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Exams</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <form action="{{ url("dashboard/exams/create") }}" method="GET">
                                    @csrf
                                    <button type="submit" class="nav-link" style="background: none; border: none;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Exam</p>
                                    </button>
                                </form>
                            </li>
                        </ul>
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
                    <div id="exams" class="col-md-12 section" style="display: block;">
                        <h3 class="text-center">Exams List</h3>
                        <div class="quote-container">
                            <blockquote class="quote">
                                "Success is not the key to happiness. Happiness is the key to success."
                                <footer>Albert Schweitzer</footer>
                            </blockquote>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Skill ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Questions Number</th>
                                        <th>Difficulty</th>
                                        <th>Duration (mins)</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{ $exam->id }}</td>
                                            <td>{{ $exam->skill_id }}</td>
                                            <td>{{ $exam->name->ar }} / {{ $exam->name->en }}</td>
                                            <td>{{ $exam->desc->ar }} / {{ $exam->desc->en }}</td>

                                            <td>

                                                <div style="display: flex; align-items: center;">
                                                    <img src="{{ asset("uploads/" . $exam->img) }}" alt="exam image"
                                                        style="width: 100px; margin-right: 10px;">
                                                    
                                                </div>
                                            </td>

                                            <td>{{ $exam->question_no }}</td>
                                            <td>{{ $exam->difficulty }}</td>
                                            <td>{{ $exam->duration_mins }} mins</td>
                                            <td>{{ $exam->active ? "Active" : "Inactive" }}</td>
                                            <td>{{ $exam->created_at }}</td>
                                            <td>{{ $exam->updated_at }}</td>
                                            <td>
                                                <a href="{{ url("dashboard/exams/edit/" . $exam->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url("dashboard/exams/delete/" . $exam->id) }}"
                                                    method="GET" style="display:inline;">
                                                    @csrf
                                                    @method("DELETE")
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
            showSection('exams');
        };
    </script>
@endsection
