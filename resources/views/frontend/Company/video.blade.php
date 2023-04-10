<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhân sự</title>
    @include('layouts.navbar')
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
</head>
<style>
    img{
        height: 150px !important;
        width: 300px;
        max-width: 100%;
}
</style>
<body>
    
    <div class="container">
        {{-- @dd($video) --}}
        @if ($video[0]->category == 'hoi-nghi-nha-dau-tu')
        <h1>Hội nghị khách hàng</h1>
        @elseif ($video[0]->category == 'video')
        <h1>Video</h1>
    @endif
        @foreach ($video as $item)
        <div class="menu">
            <div class="left-menu">
                <div class="thumbnail">
                    <img src="{{ $item->thumbnail }}" alt="">
                </div>
            </div>
            <div class="right-menu">
                <div class="title"><b>{{ $item->title }}</b></div>
                <div class="detail">Đăng vào {{ $item->created_at->format('d-m-Y') }} bởi {{ $item->created_user_name }}</div>
                <div class="sub-content">{{ $item->sub_content }}</div>
                <p><a class="btn btn-default understrap-read-more-link" href="{{ route('notice.show', ['id' => $item->id,'slug' => $item->slug]) }}">Xem thêm</a></p>
            </div>
        </div>
        @endforeach
        {{ $video->appends(request()->query())->links("pagination::bootstrap-4") }}
    </div>