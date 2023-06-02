<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin tác giả</title>
</head>
<style>
    .footer {
    width: 88% !important;
    margin-left: 6%;
    }
</style>
@include('layouts.includes.navBar')

<!-- TOP -->



<!-- END TOP -->

<!-- Modal -->


  		<div class="container voer-container">

<!-- filter top -->

<div class="hfuser-top">

    <h1>{{ $profile->title . ' ' . ' ' . $profile->fullname }} </h1>

    <div class="hfuser-content">

        <div class="hfuser-information left">

            <div class="hfuser-info ">

                <div class="hfuser-avatar left">

                    @if (!empty($profile->avatar))
                    <img src="/images/{{ $profile->avatar }}">

                    @else
                    <img src="/images/authors/author1.jpg">

                    @endif     

                </div>
    
                <div class="hfuser-name">{{ $profile->title.' '.$profile->fullname }} </div>

                

                <div class="hfuser-address">

                    @if ($profile->homepage != NULL)

                    {{ $profile->affiliation }} </div>

                
                <div class="hfuser-website">


                    <a href="{{ $profile->affiliation_url }}" target="_blank">{{ $profile->affiliation_url ??'' }}</a></div>


                <div class="hfuser-homepage">{!! trans('lang.homepage') !!} <a href="{{ $profile->homepage }}" target="_blank">{{ $profile->homepage ??'' }}</a></div>
                    @endif

                <div class="hfuser-national">{!! trans('lang.national') !!} {{ $profile->national ??''}}</div>
                    @if ($profile->biography != NULL)
                                        
                <div class="hfuser-biography text-justify">{!! trans('lang.biography') !!} <p>{!! trans($profile->biography ??'') !!}</p></div>
   
                @endif
            </div>

        </div>

    </div>

</div>

<!-- left content -->

<div id="fitertop-browserall" class="hffitertop">

    <div class="dropdown left">

        <a class="filter-title arrow-down" data-toggle="dropdown" href="#">{!! trans('lang.sort_by') !!}</a>

        <ul class="dropdown-menu dropdown-menu-sort" role="menu" aria-labelledby="dLabel">

            <li><a href="javascript:void(0)" rel="title">{!! trans('lang.title') !!}</a></li>

            <!--<li><a>Mức tương tự</a></li>

            <li><a>Đánh giá</a></li>-->

            <li><a href="javascript:void(0)" rel="modified">{!! trans('lang.date') !!}</a></li>

        </ul>

    </div>

</div>

<div id="author-materials" class="container">

  <div class="row">

    <div class="col-lg-9 left-row">

        <div class="hfitems active">

            <div id="materials-author" class="material-list">


<script>

$(document).ready(function(){

    $('.hfbtn-save').click(function(){

        //var $iditem = $(this).attr('metadata');

        //$('div[metadata='+$iditem+']').toggleClass('hfvisible');

        var btnSave = $(this);

        var mid = $(this).attr('mid');

        var version = $(this).attr('version');

        var csrfmiddlewaretoken = Voer.Helper.getCookie('csrftoken');



        $.post('/ajax/add_favorite', {mid: mid, version: version, csrfmiddlewaretoken: csrfmiddlewaretoken}, function(data){

            if (data.status) {

                btnSave.parents('.hfitem').find('.hflike').html(data.favorite_count);

            }

        });

    });

    $('.collection-save-hover').hover(

        function() {

        }, function() {

            var $iditem = $(this).attr('metadata').replace('col-hover-', '');

            var $selectItem = $('div[metadata=iditem-'+$iditem+']');

            /*if ($selectItem.hasClass('hfvisible')) {

            $selectItem.toggleClass('hfvisible');

            }*/

        }

    );

    $('.hfbtn-saveto-type').click(function(){

        var $iditemCreate = $(this).attr('metadata');

        $('div[metadata='+$iditemCreate+']').addClass('hfvisible');

        //$('div[metadata='+$iditemCreate+']').hasClass('collection-saveto-type').toggleClass('hfvisible');

    });

});

</script>

@foreach($browses as $browse)

                           <?php

                            if($browse->material_type == 1){

                                $browse->material_type = "m";

                            }else{

                                $browse->material_type = "c";

                            }

                            ?>

                    <div class="material-list-entry clearfix">

                        <div class="material-cover-wrapper left">

                            <div class="material-cover left">

                                <a title="{{$browse->title}}" alt="" href="{{route('slug',['material_type' => $browse->material_type,'slug' => $browse->slug(), 'material_id' => $browse->material_id])}}">

                                    <img src="/images/thumb/cf1a47a1a816c178bfcacb0738b048dc.jpg">

                                </a>

                            </div>



                            <div class="material-tiny-icon">

                                <img src="/images/icon-puzzle-24.png">

                            </div>

                        </div>

                        <div class="material-brief left">



                            <h5 class="module-title">

                                <a title="Tài liệu: {{ $browse->title }}" alt="Tài liệu: {{ $browse->title }}" href="{{route('slug',['material_type' => $browse->material_type,'slug' => $browse->slug(), 'material_id' => $browse->material_id])}}"> {{$browse->title}} </a>

                            </h5>

                            <p>{{$browse->description}}</p>

                            <div class="brief-published">

                                <a href="javascript:void(0)" title="Lượt xem">

                                    <i class="icon icon-view"></i>

                                    <span class="stats-count">705</span>

                                </a>

                                <!--

                                    <a href="javascript:void(0)">

                                        <i class="icon icon-favorite "  data-material-id="bdccc437" data-material-version="1" title="Thêm vào tài liệu yêu thích"></i>

                                        <span class="stats-count" title="Lượt ưa thích">0</span>

                                    </a>

                                 -->

                                <a title="Ngày tải lên">{{$browse->modified}}</a>

                        </div>

                    </div>

                    </div>



@endforeach

{{-- @include('browse.part') --}}

<script>

  $(document).ready(function(){

    var wpagination = $('.pagination').width() + 4;

    $('.pagination-block').css('width',wpagination);

  });

</script>

    {{ $browses->links("pagination::bootstrap-4") }}


            </div>

        </div>

    </div>

@include('layouts.includes.rightBar')

  </div>

</div>



<script type="text/javascript">$(function(){ Voer.Materials.run(); });</script>



          



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










<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>

<script type="text/javascript" src="//s7.addthis.com/frontend/js/300/addthis_widget.js#pubid=ra-533acc7f382c20b0"></script>



  		</div>
@include('layouts.includes.footer')
  	</div>



    <script>

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-23600843-1', 'voer.edu.vn');

      ga('send', 'pageview');

    </script>

