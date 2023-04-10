<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/drop-down.css') }}">
    <title>Document</title>
</head>
<style>
    img{
        height: 205px !important;
        width: 300px;
        max-width: 100%;
}
</style>
<body>
    @include('layouts.navbar')
    <div class="container">
        <h3>HOẠT ĐỘNG ĐOÀN THỂ</h3>
        @foreach ($activities as $item)
        <div class="menu">
            <div class="left-menu">
                <div class="thumbnail">
                    <img src="{{ $item->thumbnail }}" alt="">
                </div>
            </div>
            <div class="right-menu">
                <div class="title"><b>{{ $item->title }}</b></div>
                <div class="detail">Đăng vào {{ $item->created_at->format('d-m-Y') }} bởi {{ $item->created_user_name }}</div>
                <p><a class="btn btn-default understrap-read-more-link" href="{{ route('activities.show', ['id' => $item->id,'slug' => $item->slug]) }}">Xem thêm</a></p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>