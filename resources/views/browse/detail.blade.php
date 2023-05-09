@extends('welcome')
@section('title', 'Tài liệu')
@section('content')
<!-- TOP -->

<!-- END TOP -->

  	<div id="mainpage" class="main mainpage-content">
  		<div class="container voer-container">

    <style type="text/css">
        .collection-view-name {
            width: 100%;
        }
        .module-view-category {
            margin-right: 15px;
        }
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
        }
    </style>
<!-- LEFT ROW -->
<div class="row">
<div class="col-lg-9 left-row material-main">
    <!-- TITLE MODULE -->
    @if(!empty($data_content) && $detail->material_type == 2 && empty($data_content_id))
        <div class="collection-view-title left padding-content-15">
            <div class="material-type">{!! trans('lang.collect') !!}</div>
            <h1 class="collection-view-name left clear">{{$detail->title}}</h1>
            <a class="module-view-category left clear" title="{{ $name_categories }}">{{ $name_categories }}</a>

            <h2 class="module-view-name sub-title left clear">{!! $data_content[0]->title !!}</h2>
            {{-- @dd($data_content[0]->title) --}}


            <div class="author-module-list clear">
                <span>{!! trans('lang.author') !!}</span>

                <a href="{{ route('profile', ['id' => $author->id]) }}}" class="material-author-item" title="">{{$author->fullname}}</a>

            </div>
            @elseif (!empty($data_content) && $detail->material_type == 2 && !empty($data_content_id))
            <div class="collection-view-title left padding-content-15">
                <div class="material-type">{!! trans('lang.collect') !!}</div>
                <h1 class="collection-view-name left clear">{{$detail->title}}</h1>
                <a class="module-view-category left clear" title="Business">{{ $name_categories }}</a>
    
                <h2 class="module-view-name sub-title left clear">{!! $data_content_id->title !!}</h2>
                {{-- @dd($data_content[0]->title) --}}
    
    
                <div class="author-module-list clear">
                    <span>{!! trans('lang.author') !!}</span>
    
                    <a href="{{ route('profile', ['id' => $author->id]) }}" class="material-author-item" title="">{{$author->fullname}}</a>
    
                </div>
            @elseif (empty($data_content) && $detail->material_type == 1 && empty($data_content_id))
    <div class="module-view-title left padding-content-15">
        <div class="material-type">{!! trans('lang.module') !!}</div>
        <h1 class="module-title left clear">{{$detail->title}}</h1>
        <a class="module-view-category left clear" title="">{{ $name_categories }}</a>
        @endif
    </div>

    <!-- END TITLE MODULE -->
    <!-- CONTENT MODULE -->
    <div class="module-view-content left padding-20">


        <div class="padding-bottom-10">


<div class="addthis_toolbox addthis_default_style toolbar">
    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
    <a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
    <a class="addthis_button_tweet"></a>
    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>


    <a class="stats-favorited" href="javascript:void(0)">
        <i class="icon icon22 icon-favorite " data-is-multiple="true"  data-material-id="570896b2" data-material-version="1" title="Thêm vào tài liệu yêu thích"></i>
        <span class="stats-count" title="Lượt ưa thích">0</span>
    </a>

</div>

        </div>

        <div class="right-side">
<div id="analysisContainer" class="analyse-block">
<div class="analyse-block__content">
{{-- <h2><span class="description">{{$detail->description}}</span></h2> --}}
<div class="content-detail">

    @if(!empty($data_content) && empty($content_id))
    {{-- @dd($data_content) --}}
    {{-- @dd($data_content[0]->text) --}}
        {!! $data_content[0]->text !!}
    @elseif (!empty($data_content) && !empty($content_id))
        {!! $data_content_id->text !!}
        @elseif (empty($dataconten) && empty($content_id))
        {!! $detail->text !!}
    @endif
</div>
</div>
</div>
</div>
<div class="container ng-star-inserted">&nbsp;</div>

    </div>
    <!-- END CONTENT MODULE -->




    <div class="bottom-module-content left padding-content-15 with-100">


<div class="addthis_toolbox addthis_default_style toolbar">
    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
    <a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
    <a class="addthis_button_tweet"></a>
    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>


    <a class="stats-favorited" href="javascript:void(0)">
        <i class="icon icon22 icon-favorite " data-is-multiple="true"  data-material-id="570896b2" data-material-version="1" title="Thêm vào tài liệu yêu thích"></i>
        <span class="stats-count" title="Lượt ưa thích">0</span>
    </a>

</div>

    </div>

    <!-- COMMENT MODULE -->
    <div class="comment-module-content left padding-content-15">
        <div class="module-content-comment">
            <ul>
                <li>
                    <div class="fb-comments" data-href="http://voer.edu.vn/m/nuoc-nao-o-nhiem-khong-khi-cao-nhat-the-gioi/570896b2" data-width="742" data-numposts="10" data-colorscheme="light"></div>
                </li>
            </ul>
            <!-- <a class="btn-module-content-comment right">Góp ý</a> -->
        </div>
    </div>
    <!-- END COMMENT MODULE -->
</div>
<!-- END LEFT ROW -->
<!-- RIGHT ROW -->
<div id="material-right-side" class="col-lg-3 right-row material-info collection-info">






<div class="download-reuse">
    <div class="module-block-header" id="pdf-download">
        <div class="icon-module icon-download"></div>
        <div class="title-module"> {!! trans('lang.download') !!} </div>
    </div>
    <div class="module-block-header">
        <a href="#">
        <div class="icon-module icon-checkout"></div>
        <div class="title-module"> {!! trans('lang.reuse') !!} </div>
        </a>
    </div>
    <div id="more-download" style="display: none;">
        <ul>

                <li class="module"><a href="#" title="Nước nào ô nhiễm không khí cao nhất thế giới">{!! trans('lang.pdf_module') !!}</a></li>
                <li class="module"><a href="#" title="Nước nào ô nhiễm không khí cao nhất thế giới">{!! trans('lang.epub_module') !!}</a></li>

        </ul>
    </div>
</div>


    <!-- <div class="clearfix"></div> -->








<!-- AUTHOR NAME -->

<div class="module-view-author padding-content-10 left">
    <a class="module-view-author-avatar left" href="{{ route('profile', ['id' => $detail->author[0]->person_id]) }}" title="">


            <img src="/images/author1_detail.jpg" width="60" height="60" title="{{$name_author[0]}} " alt=" {{$name_author[0]}}">


    </a>
    <ul class="module-view-author-name left padding-content-10">
        <li>
            {{-- @dd($detail->author[person_id]) --}}
            <a href="{{ route('profile', ['id' => $author->id]) }}" title="{{$author->fullname ?: $author->user_id }}"> {{$author->fullname ?: $author->user_id}} </a>
        </li>
        <li class="module-view-author-status">
            <span>
                <a class="clear" href="{{ route('profile', ['id' => $author->id]) }}?types=2">{{ $count[1]->total??'0' }} {!! trans('lang.collect') !!}</label>
                </a>
            </span>
            <span>&nbsp;|&nbsp;
                <a class="clear" href="{{ route('profile', ['id' => $author->id]) }}?types=1">{{ $count[0]->total }} {!! trans('lang.module') !!}</label>
                </a>
            </span>
        </li>
    </ul>
</div>
<div class="clearfix"></div>

<!-- END AUTHOR NAME -->

  @if(!empty($list_arr) && $detail->material_type == 2)
    <div class="hflistmodule">
        <div class="table-of-contents">{!! trans('lang.table_of_content') !!}</div>
        <div class="list-module-name padding-content-10 scrollpanel no4 left sp-host material-outline-scrool">
            <div class="hffolders">
                <ul id="level-0">
                    <li id="collection-name" class="root">
                        <span><a href="#">{{$detail->title}}</a></span>
                    </li>
					<ul id='outline-collection' class='list-module-name-content'>
                    @foreach($list_arr->content as $itemc1)
                    @if (!isset($itemc1->content))
                    <li><a href="{{route('slug',['material_type' => 'c','slug' => Str::slug($itemc1->title), 'material_id' => $detail->material_id, 'content_id' => $itemc1->id])}}">{{$itemc1->title}}</a></li>
                    @else
                        <li><a href="">{{$itemc1->title}}</a>
							@if(isset($itemc1->content))
								<ul>
                                    
								@foreach($itemc1->content as $itemc2)
                                    <li><a href="{{route('slug',['material_type' => 'c','slug' => Str::slug($itemc2->title), 'material_id' => $detail->material_id, 'content_id' => $itemc2->id ??''])}}">{{$itemc2->title}}</a></li>
								@endforeach
								</ul>
							@endif
                        </li>
                        @endif
                    @endforeach
					</ul>
                </ul>
            </div>
        </div>
    </div>
    @else

    @endif


    <!--<div id="material-rating">



<div class="module-view-author left">
    <div class="material-rating-title">Đánh giá:</div>
    <div class="material-rating-content padding-content-10" data-material-id="{{ $detail->id }}" data-material-version="1">
        <div class="material-rating-average" data-average="0"  ></div>
        <span class="current-rating">0</span> dựa trên
        <span class="count-rating">0</span> đánh giá


    </div>
</div>


    </div>-->







    <!-- OTHER FROM AUTHOR -->

    <div class="clearfix"></div>


    <div id="by-same-author" class="module-block module-simple ">
        <div class="title-box">{!! trans('lang.by_same_author') !!}</div>
        <div class="padding-content-15">
            <ul id='' class='list-module-same-author'>
                @foreach($same_author as $same)
                    <li><a href="{{route('slug',['material_type' => 'm','slug' => Str::slug($same->title), 'material_id' => $same->material_id])}}">{{$same->title}}</a></li>
                @endforeach
            </ul>
            <div class="hfcontrol clear">

            </div>
        </div>
    </div>
    <!-- END OTHER FROM AUTHOR -->

    <!-- SIMILAR ITEMS -->
    {{-- <div id="similar-items" class="module-block module-simple">
        <div class="title-box">Nội dung tương tự</div>
        <div class="padding-content-15">
            <div id="module-similars" class="ajax-ev" data-ajax-trigger="load" data-ajax-url="/ajax/get-similars?mid=570896b2&version=1">&nbsp;</div>
        </div>
    </div> --}}

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

<!-- END RIGHT ROW -->
<div id="fb-root"></div>

  		</div>
  	</div>
@endsection
