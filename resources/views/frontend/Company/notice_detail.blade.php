<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
    <title>Document</title>
</head>
<style>
    img{
        height: 600px !important;
        width: 800px;
        max-width: 100%;
}
.menu{
    display: block;
}
</style>
<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="menu">
            <div class="title"><h3>{{ $notice->title }}</h3></div>
            <div class="detail">Đăng vào {{ $notice->created_at->format('d-m-Y') }} bởi {{ $notice->created_user_name }}</div>
            </div>
            <hr>
            <div class="content">
                <div class="total-content">{!! $notice->content !!}</div>
        </div>
        Đăng trong <a href="{{ route('activities.notice') }}">Tin tức công ty</a>
    </div>
</body>
</html>