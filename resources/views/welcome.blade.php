@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta http-equiv="REFRESH" content="1800" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="globalsign-domain-verification" content="_gkUEDGpxtaNVaWl512gty1CJFvIrwBX2dguiH6mJr" />
    <meta name="description"
        content="VOER là dự án của chương trình Tài nguyên Giáo dục Mở Việt Nam (hỗ trợ bởi Quỹ Việt Nam, The Vietnam Foundation - VNF). Đây là nguồn dữ liệu trung tâm cho các giáo sư, các cán bộ giảng dạy, sinh viên và những cá nhân tự học đại học ở Việt Nam.">
    <meta name="author" content="VOER">
    <meta name="keywords"
        content="voer, ocw, vietnam oer, vietnam ocw, học liệu mở, tài nguyên, giáo dục mở, giáo trình, tài liệu, material, collection, module, " />
    <link rel="shortcut icon" href="">
    <link rel="shortcut icon" href="/static/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/static/images/favicon.ico" type="image/x-icon">
    <!-- CSS -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/templates.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slide.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/flat-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/font.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/display-mathml.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery/jRating/jRating.jquery.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style type="text/css">
        @media only screen and (max-width: 767px) and (min-width: 601px) {
            .footer .row {
                margin-right: 0px !important;
                display: flex;
            }

            .footer-message {
                padding-left: 0;
                padding-right: 0;
            }

            .module-view-content iframe {
                width: 100% !important;
                height: auto !important;
            }

            .collection-details-text {
                width: 100%;
            }

            .title--collection {
                height: 40px;
                text-overflow: ellipsis;
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
            }

            .collection-mainpage-cover img {
                height: auto;
                width: 100%;
            }

            .collection-mainpage-cover {
                width: 100%;
                height: auto;
            }

            .author-collection {
                height: 40px;
            }

            .browser-author-img {
                height: auto;
                width: 100%;
            }

            .browser-author-img img {
                height: auto;
            }
        }
    </style>
    @yield('style')
</head>

<body>
    @include('frontend.section.navBar')
    <div class="container">
        @if(Request::route()->getName() == 'home')
        @include('frontend.section.slider')
        @include('frontend.section.about')
        @endif
        <div id="mainpage" class="main">
            @yield('content')
        </div>
        @include('frontend.section.modal')
        @include('layouts.includes.footer')
    </div>
    <!-- Modal -->
    <!-- JS -->
    <script type="text/javascript" src="{{ asset('/frontend/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/flatui-checkbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/application.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/display-mathml.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('/frontend/js/scrollbar.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('/frontend/js/jRating.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.materials.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/jquery.bootstrap-growl.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        if ('{{ $errors->any() }}') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ $errors->first() }}',
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        (function() {
            var cx = '001654820113317997538:4e99y9devu8';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
    @yield('script')
</body>

</html>