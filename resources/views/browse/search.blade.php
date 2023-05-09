@extends('welcome')
@section('title', 'Tìm kiếm tài liệu')
@section('content')
<div class="container" style="padding-top: 80px">
    <div class="row">
        <!-- left content -->
        <div class="col-lg-9 left-row">
            <script>
			
                $(document).ready(function(){
                    $(document).on('click', '.dropdown-menu-sort a', function(){
                        $('#filter-sort').val($(this).attr('rel'));

                        if($(this).attr('rel')=='modified') {
                            $(this).attr('rel', '-modified');
                            $(this).html('Ngày mới nhất');
                            //$(this).addClass('edit-sort');
                            $('.dropdown-menu-sort a').removeClass('edit-sort').filter('a[rel^="-modified"]').addClass('edit-sort');
                            // $('.filter-title').html('Ngày a-z');
                        }
                        else if($(this).attr('rel') == '-modified'){
                            $(this).attr('rel', 'modified');
                            $(this).html('Ngày cũ nhất');
                            $('.dropdown-menu-sort a').removeClass('edit-sort').filter('a[rel^="modified"]').addClass('edit-sort');
                            //$('.filter-title').html('Ngày z-a');
                        }
                        else if($(this).attr('rel')=='title') {
                            $(this).attr('rel', '-title');
                            $(this).html('Tiêu đề a-z');
                            // $(this).addClass('edit-sort');
                            // $('.filter-title').html('Tiêu đề a-z');
                            $('.dropdown-menu-sort a').removeClass('edit-sort').filter('a[rel^="-title"]').addClass('edit-sort');
                        }
                        else if($(this).attr('rel') == '-title'){
                            $(this).attr('rel', 'title');
                            $(this).html('Tiêu đề z-a');
                            // $(this).addClass('edit-sort');
                            // $('.filter-title').html('Tiêu đề z-a');
                            $('.dropdown-menu-sort a').removeClass('edit-sort').filter('a[rel^="title"]').addClass('edit-sort');
                        }
                        ajaxGetMaterialByCondition();
                    });
                    $('.hfbtn-save').click(function(){
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
                });
            </script>

            <div class="hfitems active">
                <div id="materials" class="material-list">

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


                        <div>
                            <div>
                                @if (!empty(auth('front')->user()))
                                <div class="row mb-2">
                                    <a href="{{ route('register.write', ['id' => auth('front')->user()->id]) }}" class="btn btn-primary"> Thêm bài viết mới</a>
            
                                    <!-- /.col -->
                                </div>
                                @endif
                            </div>
                        </div>
                        <h3>Tìm thấy {{ $material->total() }} bài viết có từ khóa là <b>"{{ $keyword }}"</b></h3>

<br><br>

                    @foreach($material as $item)

                           <?php
                            if($item->material_type == 1){
                                $item->material_type = "m";
                            }else{
                                $item->material_type = "c";
                            }
                            ?>

                    <div class="material-list-entry clearfix">




                        <div class="material-cover-wrapper left">
                            <div class="material-cover left">
                                <a title="" alt="" href="{{route('slug',['material_type' => $item->material_type,'slug' => $item->slug(), 'material_id' => $item->material_id])}}">

                                    <img src="{{ asset('images/thumb/ebc61d79899d290aacd70cf04f945622.jpg') }}">



                                </a>
                            </div>

                            <div class="material-tiny-icon">
                                <img src="{{ asset('images/icon-puzzle-24.png') }}">
                            </div>
                        </div>
                        <div class="material-brief left">

                            <h5 class="module-title">
                                <a title="Tài liệu: Bài toán các vị tướng Byzantine và ứng dụng trong Blockchain" alt="Tài liệu: Bài toán các vị tướng Byzantine và ứng dụng trong Blockchain" href="{{route('slug',['material_type' => $item->material_type,'slug' => $item->slug(), 'material_id' => $item->material_id])}}"> {{$item->title}} </a>
                            </h5>
                            <p>{{$item->description}}</p>
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


                                <a title="Ngày tải lên">{{$item->modified}}</a>

                        </div>


                    </div>
                    </div>

@endforeach
{{ $material->appends(request()->query())->links("pagination::bootstrap-4") }}


                    <script>
                        $(document).ready(function(){
                            var wpagination = $('.pagination').width() + 4;
                            $('.pagination-block').css('width',wpagination);
                        });
                    </script>







                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 right-row">
            <div class="hffilter-right">
                <div id="fitertop-browserall fitertop-edit" class="hffitertop fitertop-edit">
                    <div class="dropdown left">
                        <a class="filter-title arrow-down" data-toggle="dropdown" href="#">{!! trans('lang.sort_by') !!}</a>
                        <ul class="dropdown-menu-sort menu-new-update" role="menu" aria-labelledby="dLabel">
                            <li><a href="javascript:void(0)"  rel="modified">Ngày mới nhất</a></li>
                            <!-- <li><a href="javascript:void(0)" rel="-modified">Ngày z-a</a></li> -->
                            <li><a href="javascript:void(0)"  rel="title">Tiêu đề a-z</a></li>
                            <!--  <li><a href="javascript:void(0)" rel="-title">Tiêu đề z-a</a></li> -->
                            <!--<li><a>Mức tương tự</a></li>
                            <li><a>Đánh giá</a></li>-->

                        </ul>
                    </div>
                    <div class="fiterbutton right">

                    </div>
                </div>
                <style type="text/css">
                    @media only screen and (max-width: 767px) {
                        .bigbox-common {
                            display: none;
                        }
                        .hffitertop .dropdown {
                            width: 100%;
                            padding: 0;
                        }
                        .menu-new-update {
                            display: flex;
                            width: 100%;
                        }
                        .menu-new-update li {

                            width: 100%;
                        }
                        .material-list-entry {
                            display: flex;
                        }
                        .material-brief h5 a {
                            font-size: 13px;
                        }
                        .material-brief p {
                            color: #3e3e3e;
                            font-size: 12px;
                        }
                        .footer .row {
                            margin-right: 0px!important;
                            display: flex;
                        }
                        .footer-message {
                            padding-left: 0;
                            padding-right: 0;
                        }
                    }
                    
                </style>
            </div>
        </div> --}}
        {{-- @include('layouts.includes.rightBar') --}}
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
@endsection