<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <div class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <!-- /.card -->

            <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                <h1 class="card-title" style="color: #fff">Chỉnh sửa thông tin người dùng</h1>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form id="form" action="{{ route('register.update', auth('front')->user()->id) }}" method="POST" enctype="multipart/form-data" style="padding-left: 25px; padding-right: 25px;">
                @csrf
                @method('PUT')
                
  
              <div class="form-group">
                <label for="user_id">Tên đăng nhập</label>
                <input type="text" disabled name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                    placeholder="Mô tả" value="{{ old('user_id', $user_info->user_id) }}">
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                    placeholder="Tiêu đề" value="{{ old('fullname', $user_info->fullname) }}">
                @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Tiêu đề" value="{{ old('password', $user_info->password) }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                    placeholder="Tiêu đề" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Tiêu đề" value="{{ old('email', $user_info->email) }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Họ</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    placeholder="Tiêu đề" value="{{ old('last_name', $user_info->last_name) }}">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">Tên</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                    placeholder="Tiêu đề" value="{{ old('first_name', $user_info->first_name) }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="homepage">Trang chủ</label>
                <input type="text" name="homepage" class="form-control @error('homepage') is-invalid @enderror" id="homepage"
                    placeholder="Tiêu đề" value="{{ old('homepage', $user_info->homepage) }}">
                @error('homepage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Tiêu đề" value="{{ old('title', $user_info->title) }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiliation">Liên kết</label>
                <input type="text" name="affiliation" class="form-control @error('affiliation') is-invalid @enderror" id="affiliation"
                    placeholder="Tiêu đề" value="{{ old('affiliation', $user_info->affiliation) }}">
                @error('affiliation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiliation_url">Đường dẫn liên kết</label>
                <input type="text" name="affiliation_url" class="form-control @error('affiliation_url') is-invalid @enderror" id="affiliation_url"
                    placeholder="Tiêu đề" value="{{ old('affiliation_url', $user_info->affiliation_url) }}">
                @error('affiliation_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="national">Quốc tịch</label>
                <input type="text" name="national" class="form-control @error('national') is-invalid @enderror" id="national"
                    placeholder="Tiêu đề" value="{{ old('national', $user_info->national) }}">
                @error('national')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
  
              <div class="form-group">
                  <label for="biography">Tiểu sử</label>
                  <textarea name="biography" class="form-control @error('biography') is-invalid @enderror"
                      id="biography"
                      placeholder="Nội dung bài viết">{!! old('biography', $user_info->biography) !!}</textarea>
                  @error('biography')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
  
              <div class="form-group">
                  <label for="avatar">Ảnh đại diện</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="avatar" id="avatar">
                      <label class="custom-file-label" for="avatar">Tải lên hình ảnh bài viết</label>
                  </div>
                  @error('avatar')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
    
                <button class="btn btn-primary" type="submit">Cập nhật</button>
                <a href="{{ route('register.show', ['id' => auth('front')->user()->id]) }}"><button class="btn btn-danger btn-close" type="button">Hủy</button></a>
                <br>
                <br>
            </form>

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

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
</body>
</html>
