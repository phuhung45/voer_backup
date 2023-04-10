<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <h1 class="card-title" style="color: #fff">Chỉnh sửa thông tin tài liệu</h1>
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
              <form id="form" action="{{ route('recruitment.update', $recruitment) }}" method="POST" enctype="multipart/form-data" style="padding-left: 25px; padding-right: 25px;">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                  <label for="title">Tiêu đề</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                      placeholder="Tiêu đề" value="{{ old('title', $recruitment->title) }}">
                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
  
              <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                    placeholder="Mô tả" value="{{ old('description', $recruitment->introtext) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
  <br>
              <div class="form-group">
                  <label for="text">Nội dung bài viết</label>
                  <textarea name="text" class="form-control @error('text') is-invalid @enderror"
                      id="text"
                      placeholder="Nội dung bài viết">{!! old('text', $recruitment->fulltext) !!}</textarea>
                  @error('text')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
  
              <div class="form-group">
                  <label for="image">Hình ảnh</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="images" id="images">
                      <label class="custom-file-label" for="images">Tải lên hình ảnh bài viết</label>
                  </div>
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
  <br>
    
                <button class="btn btn-primary" type="submit">Cập nhật</button>
                <a href="{{ route('recruitment.update', $recruitment->id) }}"><button class="btn btn-danger btn-close" type="button">Hủy</button></a>
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
</body>
</html>