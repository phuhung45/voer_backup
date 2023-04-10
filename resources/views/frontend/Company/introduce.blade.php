<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style2.css') }}">
</head>
<style>
    .container {
    width: 100%;
    margin-left: 0px !important;
    padding-left: 0px !important;
}
</style>
<body>
@include('layouts.navbar')
    <div class="container">
        <div class="introduce">
            <h1>Giới thiệu công ty</h1>
        </div>

    <div class="description">
        {!! $introduce->description !!}
    </div>
    <div class="description-video">
        {!! $introduce->video !!}
    </div>
    </div>
</body>
</html>


