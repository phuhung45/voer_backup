@extends('layouts.includes.navBar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .alert.alert-danger {
    width: 100% !important;
    margin-left: 0%!important;
}
button.btn.btn-danger.btn-close {
    margin-top: 20px;
}
</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Đổi mật khẩu') }}</div> --}}

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Mật khẩu cũ</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Mật khẩu cũ của bạn">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật khẩu mới</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="Mật khẩu mới của bạn">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Nhập lại mật khẩu mới</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Nhập lại mật khẩu mới của bạn">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Xác nhận</button>
                            <a href="{{ route('register.show', ['id' => auth('front')->user()->id]) }}">
                            <button class="btn btn-danger btn-close" type="button">Hủy</button></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>