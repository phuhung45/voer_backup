<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách tài liệu</title>
</head>
<style>
    .footer {
    width: 88% !important;
    margin-left: 6%;
    }
</style>
@include('layouts.includes.navBar')
<body>


    <div class="container" style="padding-top: 80px">
        <div class="row">
            <!-- left content -->
            <div class="col-lg-9 left-row material-index">

                <!--như ở đây bác đứng để script như thế này nó rối lắm oki bác-->
                <div class="hfitems active">
                    <div id="materials" class="material-list">

                        <br>

                        <div>
                            <div>
                                @if (!empty(auth('front')->user()))
                                <div class="row mb-2">
                                    <a href="{{ route('register.write', ['id' => auth('front')->user()->id]) }}"
                                        class="btn btn-primary"> Thêm bài viết mới</a>

                                    <!-- /.col -->
                                </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        @include('browse.part')

                        <script>
                            $(document).ready(function(){
                            var wpagination = $('.pagination').width() + 4;
                            $('.pagination-block').css('width',wpagination);
                        });
                        </script>

                        {{-- {{ $browses->appends(request()->query())->links("pagination::bootstrap-4") }} --}}






                    </div>
                </div>
            </div>
            <div class="col-lg-3 right-row">
                <div class="hffilter-right">
                    <div id="fitertop-browserall fitertop-edit" class="hffitertop fitertop-edit">
                        <div class="dropdown left">
                            <a class="filter-title arrow-down" data-toggle="dropdown" href="#">{!! trans('lang.sort_by')
                                !!}</a>
                            <ul class="dropdown-menu-sort menu-new-update" role="menu" aria-labelledby="dLabel">
                                <li><a href="javascript:void(0)" rel="modified">Ngày mới nhất</a></li>
                                <!-- <li><a href="javascript:void(0)" rel="-modified">Ngày z-a</a></li> -->
                                <li><a href="javascript:void(0)" rel="title">Tiêu đề a-z</a></li>
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
                                margin-right: 0px !important;
                                display: flex;
                            }

                            .footer-message {
                                padding-left: 0;
                                padding-right: 0;
                            }
                        }
                    </style>
                </div>
            </div>
            @include('layouts.includes.rightBar')
        </div>

    </div>

    <script type="text/javascript">
        $(function(){ Voer.Materials.run(); });
    </script>



    <!-- Modal -->
    <div class="modal fade" id="voer-message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">VOER message</h4>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script type="text/javascript" src="http://127.0.0.1:8000/frontend/js/common.js"></script>

<!--script-->

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
    @include('layouts.includes.footer')
</body>
</html>