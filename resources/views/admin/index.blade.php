@extends('admin.layout')

@section('title')
Admin Panel
@endsection

@section('body')

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
      <img src="{{ asset("admin/img/logo.png") }}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset("admin/img/user-profile.jpg") }}" class="img-circle elevation-2"
                  alt="User Image">
          </div>
          <div class="info">
             
              <a href="{{ url('dashboard/categories') }}" class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Sample Pages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <form action="{{ url('dashboard/categories/create') }}" method="GET">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('dashboard/skills/store') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page two</p>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('dashboard/exams/store') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page three</p>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('dashboard/questions/store') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page four</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
  </div>
</aside>

<div class="content-wrapper">
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <h3 class="text-center">Categories</h3>
                  <ul class="list-group">
                      @foreach($cat as $category)
                          <li class="list-group-item d-flex justify-content-between">
                              <span>{{ $category->name->ar }}</span>
                              <span>{{ $category->name->en }}</span>
                              <div class="btn-group">
                                  <a href="{{ url('dashboard/categories/edit/'.$category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                  <form action="{{ url('dashboard/categories/delete/'.$category->id) }}" method="GET" style="display:inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                              </div>
                          </li>
                      @endforeach
                  </ul>
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

@endsection
