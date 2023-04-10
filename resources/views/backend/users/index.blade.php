@extends('backend.layouts.sliderBar')
@section('title', 'Trang quản lý người dùng')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <a href="{{ url('/logout') }}" class="dropdown-item">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>


        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Thêm người dùng</a>

                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">

                <div class="container-fluid">
                    <div class="row">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Danh sách người dùng</h3>

                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Email</th>
                                            <th>Họ và tên</th>
                                            <th>Nhân viên</th>
                                            <th>Kích hoạt</th>
                                            <th>Quản trị</th>
                                            <th>Đăng nhập cuối</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                        <tr class="mode-user-delete-change-status-functionex-{{$user->id}}">
                                                <td>
                                                    {{ $user->id }}
                                                </td>

                                                <td>
                                                    {{ $user->username }}
                                                </td>

                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->last_name . ' ' . $user->first_name }}
                                                </td>


                                                <td>
                                                    {{ $user->is_staff ? 'có' : 'không' }}

                                                </td>

                                                <td>
                                                    {{ $user->is_active ? 'có' : 'không' }}

                                                </td>

                                                <td>
                                                    {{ $user->is_superuser ? 'có' : 'không' }}

                                                </td>
                                                <td>
                                                    {{ date('d-m-Y H:i:s', strtotime($user->last_login)) }}
                                                </td>

                                                <td class="test">
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <p href="#" style="margin: auto" data-mode-name="user-delete" data-mode-id="{{ $user->id }}"  data-method="DELETE" class="btn-load-url-confirm btn btn-danger" data-href="{{ route('user.destroy', $user->id) }}"
                                                        class="btn btn-danger btn-delete">
                                                        <i class="fa-solid fa-trash"></i></a>
                                                    
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $users->links('pagination::bootstrap-4') }}

                            </div>
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
  
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    url: $(this).attr('href'),
                    success: function(response, textStatus, xhr) {
                        alert(response)
                        location.reload();
                    }
                });
                
            })
            $('.btn-load-url-confirm').on('click', function(e){
              const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                  })
  
                  swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  reverseButtons: true
                  }).then((result) => {
                  if (result.isConfirmed) {
                      swalWithBootstrapButtons.fire(
                      'Deleted!',
                      'Your user has been deleted.',
                      'success'
                      );
                      e.preventDefault();
                      var url = $(this).attr('data-href');
                      var method = $(this).attr('data-method');
                      var data_mode_name = $(this).attr('data-mode-name');
                      var data_mode_id = $(this).attr('data-mode-id');
                      // console.log(url);
                      $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          type: method,
                          url: url,
                          success: function(response, textStatus, xhr) {
                              //   alert(response)
                              $('.mode-'+data_mode_name+'-change-status-functionex-'+data_mode_id).remove();
                              console.log("zzzz");
                              //   location.reload();
                          }
                      });
                  } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                  ) {
                      swalWithBootstrapButtons.fire(
                      'Cancelled',
                      'Your user is safe :)',
                      'error'
                      )
                  }
                  })
              
            });
        });
    </script>
    <!-- jQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

</body>

</html>
