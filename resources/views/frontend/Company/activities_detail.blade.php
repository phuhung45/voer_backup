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
    img {
    width: 300px;
    height: 220px !important;
    max-height: 100%;
    margin-right: 10px;
    margin-bottom: 20px;
}
</style>
<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="image">
            {!! $activities->content !!}
        </div>
    </div>
</body>
</html>