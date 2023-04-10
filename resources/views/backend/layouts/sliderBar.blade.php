<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="sidebar-mini sidebar-open" style="height: auto;">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/voer-logo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>
    <div class="wrapper">

        <title>@yield('title', config('app.name'))</title>
        <!-- Preloader -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.index') }}" class="brand-link">
                <img src="{{ asset('dist/img/voer-logo.png') }}" alt="VOER Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 1">
                <span class="brand-text font-weight-light">VOER - ADMIN</span>
            </a>

            <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                        <a href="#"
                            class="d-block">{{ Auth::user()->last_name . ' ' . Auth::user()->first_name }}</a>
                    </div>
                </div>
                
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <form action="{{ route('admin.search') }}" method="GET">
                                <input type="search" class="form-control form-control-sidebar" name="keyword" value="" style="width: 100%; margin-right: 50px;" placeholder="Search">

                            </form>
                        </button>
                        </div>
                        </div>
                <!-- SidebarSearch Form -->
                {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('admin.show') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Danh sách tài liệu</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('admin.hide') }}" class="nav-link">
                                <i class="fa-solid fa-eye-slash"></i>
                                <p>Danh sách tài liệu đã ẩn</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('author.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Danh sách tác giả</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>Quản lý người dùng</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->

        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>

<script>
$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});</script>
