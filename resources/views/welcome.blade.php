@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@include('layouts.includes.navBar')
    <!DOCTYPE html>
<html lang="en">
<head>

    <title>Vietnam OER, Tài nguyên giáo dục Mở Việt Nam</title>

    <meta charset="utf-8">
    <meta http-equiv="REFRESH" content="1800" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="globalsign-domain-verification" content="_gkUEDGpxtaNVaWl512gty1CJFvIrwBX2dguiH6mJr" />

    <meta name="description" content="VOER là dự án của chương trình Tài nguyên Giáo dục Mở Việt Nam (hỗ trợ bởi Quỹ Việt Nam, The Vietnam Foundation - VNF). Đây là nguồn dữ liệu trung tâm cho các giáo sư, các cán bộ giảng dạy, sinh viên và những cá nhân tự học đại học ở Việt Nam.">

    <meta name="author" content="VOER">
    <meta name="keywords" content="voer, ocw, vietnam oer, vietnam ocw, học liệu mở, tài nguyên, giáo dục mở, giáo trình, tài liệu, material, collection, module, "/>



    <link rel="shortcut icon" href="">
    <link rel="shortcut icon" href="/static/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/static/images/favicon.ico" type="image/x-icon">

    <!-- Google Adsense -->
    {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3186821532152969",
            enable_page_level_ads: true
        });
    </script> --}}
{{-- @dd(auth('front')->user()) --}}
{{-- 
    <link href="frontend/css/bootstrap.css" rel="stylesheet">
    <link href="frontend/css/templates.css" rel="stylesheet">
    <link href="frontend/css/slide.css" rel="stylesheet">
    <link href="frontend/css/scrollbar.css" rel="stylesheet">
    <link href="frontend/css/common.css" rel="stylesheet">
    <link href="frontend/css/flat-ui.css" rel="stylesheet">
    <link href="frontend/fonts/font.css" rel="stylesheet">
    <link href="frontend/css/responsive.css" rel="stylesheet">
    <link href="frontend/css/display-mathml.css" rel="stylesheet">
    <link href="frontend/css/jquery/jRating/jRating.jquery.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet"> --}}

    {{-- <script type="text/javascript" src="/static/CACHE/js/a9d22eb9d33b.js"></script> --}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->




</head>
<body>





<!-- TOP -->

<!-- END TOP -->




{{-- <script>
    (jQuery)(function($){
        $(document).on('click', '.btn-login-submit', function() {
            // Voer.Helper.login();
            // return false;
            // console.log(Voer.Helper.login());
        });
        $(document).on('submit', '#login-form', function(e) {
            // Voer.Helper.login();
            // return false;
            // console.log(Voer.Helper.login());
            e.preventDefault();
            var url = $(this).attr('action');
            var method = $(this).attr('method');

            var formData = new FormData(this);
            $.ajax({
                type: method,
                data: formData,
                url: url,
                success: function(data) {
                    console.log(ddata);
                }
            });
        });
        
    });
</script> --}}

<script>
    (jQuery)(function($){
        if('{{ $errors->any() }}'){
            Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{$errors->first()}}',
            showConfirmButton: false,
            timer: 1500
            })

        }
    });
</script>



<style type="text/css">

    @media only screen and (max-width: 767px) {
        .footer .row {
            margin-right: 0px!important;
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
<!-- SLIDE -->
<div id="slider" class="slide1">
    <div class="slider-content main container" style="justify-content: center; display: flex;">
        <div class="slider-content-left left">
            <h1 class="text-header-slider-left left clear">{!! trans('lang.home_title') !!}</h1>
            <div class="div-input-search left clear">
                <script>
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
                <gcse:searchbox-only></gcse:searchbox-only>

            </div>
            <div class="text-slider-left left clear">
                {!! trans('lang.home_description') !!}
            </div>
        </div>
 
    </div>
</div>
<!-- END SLIDE -->

    <div class="support-main">
        <div class="support-link">
            <a href="https://vnfoundation.org/donate">
                <br>
                <br>
                <h4>Support a vibrant, educator-focused Commons</h4>
                <p>The tens of thousands of open resources on OER Commons are free - and they will be forever - but building communities to support them, developing new collections, and creating infrastructure to grow the open community isn’t. Grassroots donations from people like you can help us transform teaching and learning.</p>
                <br>
                <p>Make a Donation Today!</p>
                <button><i class="fa fa-heart" aria-hidden="true"></i> Donate</button>
            </a>
    </div>
    </div>


<div id="mainpage" class="main">
    <div class="container">
        <!-- LIST MODULE MAINPAGE -->
        <h5 class="home-section-heading">
            <p>{!! trans('lang.featured_materials') !!}</p>
            <hr style="border: 1px solid; border-radius: 5px; color:#ce204e; width:6%; margin-left: 1px">
        </h5>
        <div class="list-collection-mainpage row">




    @foreach($material_top as $material_top_detail)
            <div class="col-xs-6 col-sm-4 col-md-4" style="height: 450px">
                <div class="collection-mainpage-cover">
                    <a href="{{route('slug',['material_type' => 'c','slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id])}}" title="{{$material_top_detail->title}}">

                    @if(!empty($material_top_detail->fileRandImage()))
                        <img src="/images/contents/{{$material_top_detail['material_id']}}.jpg" alt="{{$material_top_detail->title}}"/>
                    @else
                        <img src="/images/contents/default_image_where_null_data" alt="{{$material_top_detail->title}}"/>
                    @endif
                    </a>
                </div>
                <div class="collection-mainpage-details clearfix">
                    <div class="" style="width:95%; padding-left:2.5%">
                        <div class="category" style="height: 20px;">
                                        @foreach ($name_arr as $name)
                                                @if ($name[0]['material_id'] === $material_top_detail->id)
                                                    <p>{{ $name[0]['name'] }}</p>
                                                    @break
                                                @endif
                                        @endforeach

                            </div>

                        <div class="title-collection title--collection" style="height: 10%;">
                            <a href='{{route('slug',['material_type' => 'c','slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id])}}' title="{{$material_top_detail->title}}">{{$material_top_detail->title}}</a>
                        </div>
                            <div class="descr" style="height: 50px">
                                <p>{!! $material_top_detail->description !!}</p>
                                </div>
<hr>                                
                        <div class="author-collection" style="margin-top:auto">
                            <div class="avatar">
                                <img src="/images/authors/author1_detail.jpg" alt="Avatar" class="avatar" />
                            </div>
                            @foreach ($author as $item)
                            <a href="{{route('profile', ['id' => $item['0']->id])}}" title="{{ $item[0]->fullname }}" > 
                                @if ($item[0]->material_rid === $material_top_detail->id)
                                {{ $item[0]->fullname }}
                                @endif</a>
                            @endforeach
                            

                            
                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="{{route('slug',['material_type' => $material_top_detail->material_type,'slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id])}}">{!! trans('lang.read') !!}</a>                        
                            </div>
                        
                    </div>
                </div>
            </div>
        @endforeach



        </div>
        <!-- LIST MODULE MAINPAGE -->
        <!-- BROWSER -->
        <div class="home-browse clearfix">
            <a class="btn-browser-all left clear" href="/browse" title="Tra cứu Tài liệu">
                {!! trans('lang.browses') !!}
            </a>
        </div>


        <div class="mainpage-browser-content">
            <h5 class="home-section-heading">
                <p>{!! trans('lang.featured_authors') !!}</p>
                <hr style="border: 1px solid; border-radius: 5px; color:#ce204e; width:6%; margin-left: 1px">
            </h5>
		<div class="list-mainpage-browser list-author-mainpage row">
            @foreach ($author_top as $item )
            

<div class="col-xs-4 col-sm-3 col-md-2">
    <div class="browser-author-img">
        <a href="{{route('profile', ['id' => $item['id']])}}" title="{{ $item->title }}"><img src="/images/authors/{{ $item['id'] }}.jpg" /></a>

    </div>
    <div class="browser-author-details">
        <div class="icon-browser-author"></div>
        <div class="browser-author-name">
            <a href="{{route('profile', ['id' => $item['id']])}}" title="{{ $item->fullname }}"> {{ $item->fullname }} </a>
        </div>
        <div class="browser-author-add" style="height:50px"> {{ $item->affiliation }} </div>
        
    </div>

    <hr style="width:100%; border:1px solid; color: #ce204e; border-radius: 5px;">

</div>
@endforeach
</div>
</div>

        </div>
        <!-- END BROWSER -->

    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="voer-message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">VOER message</h4>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    @include('layouts.includes.footer')

</body>
</html>
