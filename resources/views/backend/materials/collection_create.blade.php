@extends('backend.layouts.sliderBar')
@section('title', 'Thêm bài viết mới')
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
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>


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
                <h1 class="card-title" style="color: #fff">Thêm giáo trình mới</h1>
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
              <form id="form" action="{{ route('create-collection.store') }}" method="POST" enctype="multipart/form-data" style="padding-left: 25px; padding-right: 25px;">
                @csrf
    
                <div class="form-group">
                  <label for="title">Tiêu đề</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="last_name"
                      placeholder="nhập vào tiêu đề bài viết" value="{{ old('title') }}">
                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
  
  
              <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    placeholder="Mô tả bài viết">{!! old('description') !!}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
  
          
            <?php
            $categories = DB::table('vpr_content_category')->select('id', 'name')->get()
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
                          <div class="form-group">
                            <label for="categories">Danh mục bài viết</label>
                            <br>
                              @foreach ($categories as $category)
                              <input type="checkbox" name="categories[name][]" value="{{ $category->id }}"> {{ $category->name }}
                              @endforeach
                                   @error('categories')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>
{{--   
              <div class="form-group">
                <label for="categories">Danh mục bài viết</label>
                <input type="text" name="categories" class="form-control @error('categories') is-invalid @enderror" id="categories"
                       placeholder="nhập vào danh mục của bài viết" value="{{ old('categories') }}">
                       @error('categories')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div> --}}

            <div class="form-group">
              <label for="language">Ngôn ngữ</label>
              <select name="language" class="form-control @error('language') is-invalid @enderror" id="material_type">
                  <option value="vi">Tiếng Việt</option>
                  <option value="en" disabled style="background-color:#c0b9b9">Tiếng Anh</option>
              </select>
          </div>

            <div class="form-group field_wrapper" id="navbar-search-input">

            <label for="text">Thông tin giáo trình</label>
            <br>
            <div class="form-group">
                <input type="hidden" class="input_lisence" name="content[0][lisence]"
                    value="http://creativecommons.org/licenses/by/3.0/">
                <input type="hidden" id="input_title" class="input_title" name="content[0][title]"
                    value="">
                <input type="hidden" class="input_url" name="content[0][url]"
                    value="http://www.voer.edu.vn/m/">
                <input type="hidden" class="input_version" name="content[0][version]"
                    value="1">
                <input type="hidden" class="input_authors" name="content[0][authors][]"
                    value="{{ $author[0]->fullname }}" placeholder="Your author">
                <input type="text" id ="input_author" class="input_authors" name="content[0][authors]"
                    value="{{ $author[0]->fullname }}" placeholder="Your author" disabled>
                <input type="hidden" class="input_type" name="content[0][type]"
                    value="module" placeholder="Your id">
                    <br>
                @foreach ($material as $item)
                    <input type="radio" class="input_material_id" name="content[0][id]"
                        value="{{ $item->material_id }}"
                        placeholder="Your id"
                        onclick="handle(0)"
                        ><p style="margin-left: 25px; margin-top: -21px;">{{ $item->title }}</p>
                @endforeach
            </div>
            <button type="button" data-number="0" class="add_field">Thêm tài liệu</button>
                <button class="btn btn-primary" type="submit">Thêm bài viết</button>
                <a href="{{ route('admin.index') }}"><button class="btn btn-danger btn-close" type="button">Hủy</button></a>
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
    $(document).on('click', '.add_field', function() {
        const number = Number($(this).data('number')) + 1
        const html = `
<div class="form-group">
    <input type="hidden" class="input_lisence" name="content[` + number + `][lisence]"
        value="http://creativecommons.org/licenses/by/3.0/">
    <input type="hidden" id="input_title" class="input_title" name="content[` + number + `][title]"
        value="">
    <input type="hidden" class="input_url" name="content[` + number + `][url]"
        value="http://www.voer.edu.vn/m/">
    <input type="hidden" class="input_version" name="content[` + number + `][version]"
        value="1">
    <input type="hidden" class="input_authors" name="content[` + number + `][authors][]"
        value="{{ $author[0]->fullname }}" placeholder="Your author">
    <input type="text" class="input_authors" name="content[` + number + `][authors]"
        value="{{ $author[0]->fullname }}" placeholder="Your author" disabled>
    <input type="hidden" class="input_type" name="content[` + number + `][type]"
        value="module" placeholder="Your id">
        <br>
        @foreach ($material as $item)
          
    <input type="radio" id="input_id" class="input_material_id" name="content[` + number + `][id]"
        value="{{ $item->material_id }}" placeholder="Your id"
        onclick="handle(
        `
        +number+
        `)"

        ><p style="margin-left: 25px; margin-top: -21px;">{{ $item->title }}</p>

        @endforeach
    </div>
`;
        $(html).insertAfter('.form-group:last');
        $(this).data('number', number);
    })
</script>

<script>

    console.log("----");
    
    handle = (id) => {
    const rd = document.getElementsByName(`content[${id}][id]`)
      rd.forEach(element => {
      if (element.checked) {
        const inp = document.getElementsByName(`content[${id}][title]`)
        inp.forEach(it => {
          it.value = element.nextSibling.textContent
        })
        console.log(element.nextSibling.textContent);
      }

      
    });
    }
  </script>
  
<script>
    $(".multiple_select").mousedown(function(e) {
        if (e.target.tagName == "OPTION") {
            return; //don't close dropdown if i select option
        }
        $(this).toggleClass('multiple_select_active'); //close dropdown if click inside <select> box
    });
    $(".multiple_select").on('blur', function(e) {
        $(this).removeClass('multiple_select_active'); //close dropdown if click outside <select>
    });

    $('.multiple_select option').mousedown(function(e) { //no ctrl to select multiple
        e.preventDefault();
        $(this).prop('selected', $(this).prop('selected') ? false : true); //set selected options on click
        $(this).parent().change(); //trigger change event
    });


    $("#myFilter").on('change', function() {
        var selected = $("#myFilter").val().toString(); //here I get all options and convert to string
        var document_style = document.documentElement.style;
        if (selected !== "")
            document_style.setProperty('--text', "'Selected: " + selected + "'");
        else
            document_style.setProperty('--text', "'Select values'");
    });
</script>

<script src="{{ asset('ckeditor/ckeditor.js') }}') }}"></script>
{{-- <script>
  CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script> --}}

<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>

<script>
CKEDITOR.replace('text', options);
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js') }}/Chart.min.js') }}"></script>
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
