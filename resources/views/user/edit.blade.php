@extends('welcome')
@section('title', 'Chỉnh sửa thông tin người dùng')
@section('content')
<style>
.p-3.control-sidebar-content {
    display: none;
}
.footer {
    width: 88%;
    margin-left: 6%;
}
form#form {
    margin-top: 7%;
}
</style>
<div class="container">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
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
<div class="container">
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

            {{-- <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                    placeholder="Tiêu đề" value="{{ old('fullname', $user_info->fullname) }}">
                @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
{{-- 
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Tiêu đề" value="{{ old('password', $user_info->password) }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
{{-- 
            <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                    placeholder="Tiêu đề" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Email của bạn" value="{{ old('email', $user_info->email) }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Họ</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    placeholder="Họ của bạn" value="{{ old('last_name', $user_info->last_name) }}">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">Tên</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                    placeholder="Tên của bạn" value="{{ old('first_name', $user_info->first_name) }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="homepage">Trang chủ</label>
                <input type="text" name="homepage" class="form-control @error('homepage') is-invalid @enderror" id="homepage"
                    placeholder="Trang chủ của bạn" value="{{ old('homepage', $user_info->homepage) }}">
                @error('homepage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Tiêu đề của bạn" value="{{ old('title', $user_info->title) }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiliation">Liên kết</label>
                <input type="text" name="affiliation" class="form-control @error('affiliation') is-invalid @enderror" id="affiliation"
                    placeholder="Liên kết" value="{{ old('affiliation', $user_info->affiliation) }}">
                @error('affiliation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiliation_url">Đường dẫn liên kết</label>
                <input type="text" name="affiliation_url" class="form-control @error('affiliation_url') is-invalid @enderror" id="affiliation_url"
                    placeholder="Đường dẫn liên kết của bạn" value="{{ old('affiliation_url', $user_info->affiliation_url) }}">
                @error('affiliation_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="national">Quốc tịch</label>
                <input type="text" name="national" class="form-control @error('national') is-invalid @enderror" id="national"
                    placeholder="Quốc tịch của bạn" value="{{ old('national', $user_info->national) }}">
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
                      placeholder="Tiểu sử của bạn">{!! old('biography', $user_info->biography) !!}</textarea>
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
@endsection
