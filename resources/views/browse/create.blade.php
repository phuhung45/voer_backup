@extends('layouts.includes.navBar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm bài viết mới</title>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- Navbar -->
  <!-- /.navbar -->

  <style>
    :root
{
	--text: "Select values";
}
.multiple_select
{
	height: 18px;
	width: 90%;
	overflow: hidden;
	-webkit-appearance: menulist;
	position: relative;
}

form#form {
    width: 107% !important;
    margin-left: -38px !important;
}

.btn.btn-danger {
    background-color: #5f5f5f !important;
}
select#myFilter {
    height: 130px;
}
.multiple_select::before
{
	content: var(--text);
	display: block;
  margin-left: 5px;
  margin-bottom: 2px;
}
.multiple_select_active
{
	overflow: visible !important;
}
.multiple_select option
{
	display: none;
    height: 18px;
	background-color: white;
}
.multiple_select_active option
{
	display: block;
}

.multiple_select option::before {
  content: "\2610";
}
.multiple_select option:checked::before {
  content: "\2611";
}

  </style>

  <!-- Content Wrapper. Contains page content -->
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
              {{-- <div class="card-header">
                <h1 class="card-title" style="padding-left: 2%; padding-top: 85px; ">Thêm bài viết mới</h1>
              </div> --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="container">
  <form id="form" action="{{ route('browses.store') }}" method="POST" enctype="multipart/form-data" style="padding-left: 25px; padding-right: 25px;">
    @csrf

    <div class="form-group">
      <label for="title">Tiêu đề</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="last_name"
          placeholder="Nhập vào tiêu đề bài viết" value="{{ old('title') }}">
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

<div class="form-group">
  <label for="text">Nội dung bài viết</label>
  <textarea name="text" class="form-control @error('text') is-invalid @enderror"
      id="text"
      placeholder="Nội dung bài viết">{!! old('text') !!}</textarea>
  @error('text')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

  <div class="form-group">
    <label for="image">Hình ảnh</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="image" id="image">
        <label class="custom-file-label" for="image">Tải lên hình ảnh bài viết</label>
    </div>
    @error('image')
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

<div class="form-group">
  <label for="author">Id tác giả</label>
  <input type="number" name="author" class="form-control @error('author') is-invalid @enderror" id="author"
         placeholder="nhập vào id của tác giả" value="{{ auth('front')->user()->id }}" disabled>
         @error('author')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
  <label for="language">Ngôn ngữ</label>
  <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" id="language"
      placeholder="nhập vào ngôn ngữ bài viết" value="vi" disabled>
  @error('language')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

    <button class="btn btn-primary" type="submit">Thêm tài liệu</button>
    <a href="{{ route('browse.index') }}"><button class="btn btn-danger btn-close" type="button">Hủy</button></a>
    <br>
    <br>
  </form>
</div>

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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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

<script>
  $(".multiple_select").mousedown(function(e) {
    if (e.target.tagName == "OPTION") 
    {
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
      if(selected !== "")
        document_style.setProperty('--text', "'Selected: "+selected+"'");
      else
        document_style.setProperty('--text', "'Select values'");
	});
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