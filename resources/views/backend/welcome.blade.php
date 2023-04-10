<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style>
    .invalid-feedback {
        display: block
    }
</style>

@section('title', 'Đăng nhập')
<div>
    <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>

<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group">

        <div class="input-group">
            <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"
                placeholder="Tên đăng nhập của bạn" value="{{ old('username') }}" required autocomplete="username" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">

        <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu đăng nhập"
                name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Nhớ mật khẩu
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </div>
        <!-- /.col -->
    </div>
</form>
</div>
