@extends('layouts.includes.navBar')
<!DOCTYPE html>

<html lang="en">

  <head>

    <title>About Us</title>

  <meta charset="utf-8">

  <meta http-equiv="REFRESH" content="1800" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="globalsign-domain-verification" content="_gkUEDGpxtaNVaWl512gty1CJFvIrwBX2dguiH6mJr" />

  <meta name="author" content="VOER">

    <meta name="keywords" content="voer, ocw, vietnam oer, vietnam ocw, học liệu mở, tài nguyên, giáo dục mở, giáo trình, tài liệu, material, collection, module, "/>

    <link rel="shortcut icon" href="">

    <link rel="shortcut icon" href="/static/images/favicon.ico" type="image/x-icon">

    <link rel="icon" href="/static/images/favicon.ico" type="image/x-icon">

    <!-- Google Adsense -->

  </head>

  <body>

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

@include('layouts.includes.footer')

<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>

  		</div>

  	</div>

  </body>

</html>