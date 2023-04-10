<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhân sự</title>
    @include('layouts.navbar')
    <link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/style2.css') }}">
</head>
<style>
    .staff-position {
    width: 75%;
    margin-left: auto;
    }
    .tabContent {
    display:none;
    }
    .staff-avatar img{
        margin-left: 47%;
        width: 330px;
        height: 350px;
    }
    .staff-name {
    width: 75%;
    margin-left: auto;
    }
    .staff-biography {
    width: 78%;
    margin-left: auto;
    }
    .row{
        width: 80%;
        margin-left: 10%;
    }
</style>
<body>
        <div class="container">
            <div class="row">
            @foreach ($investment_team as $item)
            <div class="col-3 list-manage side bar tabs" id="{{ $item->id }}">
                <div class="avatar" id="{{ $item->id }}">
                    <img src="/images/management/{{ $item->avatar }}" alt="" onclick="showStuff(this)">
                </div>
                <div class="name">
                    <h6 onclick="showStuff(this)">{{ $item->name }}</h6>
                    <h6 onclick="showStuff(this)">{{ $item->position }}</h6>
                </div>
            </div>
            @endforeach

            <div id = {{ $item->id }} class="info-management tabContent" style="display: none">
                <div class="avatar-management">
                    <img src="/images/management/{{ $item->avatar }}" alt="">
                </div>
                <div class="name-management">
                    <h5>{{ $item->name }}</h5>
                    <h5>{{ $item->position }}</h5>
                    <h6>{{ $item->biography }}</h6>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showStuff(element)  {
    var tabContents = document.getElementsByClassName('tabContent');
    for (var i = 0; i < tabContents.length; i++) { 
        tabContents[i].style.display = 'none';
    }

    // change tabsX into tabs-X in order to find the correct tab content
    var tabContentIdToShow = element.id.replace(/(\d)/g, '-$1');
    document.getElementById(tabContentIdToShow).style.display = 'block';
    }
    </script>
</body>
</html>