@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@extends('backend.layouts.sliderBar')
@section('title', 'Danh sách bài viết')
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
<style>
.button-doccument {
    margin-left: auto;
}
.alert.alert-error {
    color: red;
    margin-left: 20%;
}
a.btn {
    margin-right: 10px;
    height: 40px;
}

td.test{
    display: flex;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
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

            <!-- Sidebar -->

            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="doccument">
                            <h5>Có {{$count}} tài liệu</h5>
                            <h5>Có {{$count_hide}} <a href="{{ route('admin.hide') }}">tài liệu đã ẩn</a></h5>
                            <h5>Có {{$count_deleted}} <a href="{{ route('admin.deleted') }}">tài liệu trong thùng rác</a></h5>
                        </div>
                        
                        <div class="button-doccument">
                            <a href="{{ route('admin.create') }}" class="btn btn-primary">Thêm tài liệu mới</a>
                            <a href="{{ route('create-collection.create') }}" class="btn btn-primary">Thêm giáo trình mới</a>
                        </div>

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
                                <h3 class="card-title">Danh sách tài liệu</h3>

                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Thể loại</th>
                                            <th>Danh mục</th>
                                            <th>Tác giả</th>
                                            <th>Thay đổi</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materials as $material)
                                            <tr class="mode-material-delete-change-status-functionex-{{$material->id}}">
                                                <td>
                                                    <a href="{{ route('admin.edit', $material->material_id) }}">{{ $material->title }}</a>
                                                </td>

                                                <td>
                                                    @if ($material->material_type == 1)
                                                        {{ $material->material_type ? 'Tài liệu' : 'Giáo trình' }}
                                                    @elseif ($material->material_type == 2)
                                                        {{ $material->material_type ? 'Giáo trình' : 'Tài liệu' }}
                                                    @endif
                                                </td>

                                                <td>
                                                    @foreach ($name_arr as $name)
                                                        @foreach ($name as $item)
                                                            @if ($item['material_id'] === $material->id)
                                                                <p>{{ $item['name']?: ''}}</p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $material->fullname ?: $material->user_id }}
                                                </td>

                                                <td>
                                                    {{ date('d-m-Y H:i:s', strtotime($material->modified)) }}
                                                </td>
                                                <td class ="test">
                                                    <a href="{{ route('admin.edit', $material->material_id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        @if ($material->material_type == 1)
                                                            
                                                    <a href="{{route('slug',[
                                                    'material_type' => 'm',
                                                    'slug' => Str::slug($material->title),
                                                    'material_id' => $material->material_id])}}"
                                                        class="btn btn-success" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                        @else
                                                        <a href="{{route('slug',[
                                                    'material_type' => 'c',
                                                    'slug' => Str::slug($material->title),
                                                    'material_id' => $material->material_id])}}"
                                                        class="btn btn-success" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                        @endif

                                                    <p href="#" data-mode-name="material-delete" data-mode-id="{{ $material->id }}"  data-method="DELETE" class="btn-load-url-confirm btn btn-danger" data-href="{{ route('admin.destroy', $material->id) }}"
                                                        
                                                        class="btn btn-danger btn-delete"><i class="fa-solid fa-trash"></i></p>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $materials->links('pagination::bootstrap-4') }}

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
    <script>
        (jQuery)(function($){
            if('{{ $errors->any() }}'){
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{$errors->first()}}',
                showConfirmButton: false,
                timer: 3500
                })
    
            }
        });
    </script>

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
                text: "You will be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your material has been deleted.',
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
                    'Your material is safe :)',
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
