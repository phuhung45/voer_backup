@extends('welcome')
@section('title', 'Đóng góp')
@section('content')
<!-- TOP -->
<!-- END TOP -->
<!-- Modal -->
<style>
  li#input-search-right-top {
    margin-top: 0px !important;
}
.navbar-collapse img {
    margin-top: 19px;
}
li.nav-item.dropdown {
    margin-top: 50%;
}
button.btn.btn-secondary.dropdown-toggle{
      margin-top: 8px !important;
}
</style>
  	<div id="mainpage" class="main mainpage-content">

  		<div class="container voer-container">

                  



<div class="col-lg-2 col-lg-2-custom">

    <div class="hffilter-right">

        <div class="bigbox-common">                         

            <div class="content">

                @include('layouts.includes.slideBar')

            </div>

        </div>

    </div>

</div>



<div class="col-lg-1 col-lg-1-custom right-row">

    <article class="flatpage">

        <h1 class="article-title">{!! trans('lang.contribute_title') !!}</h1>

        {!! trans('lang.contribute_content') !!}

    </article>

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



<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>



  		</div>

  	</div>

