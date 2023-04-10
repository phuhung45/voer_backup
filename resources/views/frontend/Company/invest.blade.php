<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style2.css') }}">
    @include('layouts.navbar')
</head>
<body>
    <div class="container">
        <div class="pif-title">
            <h1>{{ $invest->title }}</h1>
        </div>
        <div class="pif-content">
            <p>{!! $invest->content !!}</p>
        </div>
        <div class="pif-video">

        </div>
    </div>
</body>
</html>