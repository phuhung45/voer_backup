@extends('welcome')
@section('title', 'Hướng dẫn')
@section('content')

<!-- TOP -->



<!-- END TOP -->

<!-- Modal -->


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

      {!! trans('lang.guid_title') !!}

      {!! trans('lang.guid_content') !!}
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
@endsection