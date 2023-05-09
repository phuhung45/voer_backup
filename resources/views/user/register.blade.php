@extends('welcome')
@section('title', 'Đăng ký tài khoản')
@section('content')

<!-- TOP -->
<!-- END TOP -->


<!-- Modal -->
{{-- <div class="modal fade" id="modal-user-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header padding-content-15">
        <h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
      </div>
      <form action="/user/authenticate" method="POST" id="login-form">
        <div class="modal-body padding-content-15">
          <input type='hidden' name='csrfmiddlewaretoken' value='6YPpj5AjjUse9K5g6BSybAkr6HIvu5nm' />
          <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
          <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
          <ul class="list-user-login-tools">
              <li>
                  <label class="checkbox checkbox-user-tool">
                      <span class="icons">
                          <span class="first-icon fui-checkbox-unchecked"></span>
                          <span class="second-icon fui-checkbox-checked"></span>
                      </span>
                      <input type="checkbox" data-toggle="checkbox">
                      Ghi nhớ
                  </label>
              </li>
              <li class="right">
                  <a href="/user/password/reset/">Quên mật khẩu?</a>
              </li>
          </ul>
          <button type="submit" class="btn btn-primary btn-login-submit">Đăng nhập</button>
        </div>
        <div class="modal-footer">
          <a class="btn-form-login-signup left" href="/user/register">Bạn chưa có tài khoản? Hãy đăng ký.</a>

          <div class="alert-modal-login left padding-content-10 hidden"><!-- Add class 'hidden' to hide alert -->
              <span class="left">Tên đăng nhập hoặc mật khẩu chưa đúng</span>
          </div>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div> --}}
<!-- /.modal -->

{{-- <script>
(jQuery)(function($){
  $(document).on('click', '.btn-login-submit', function() {
    Voer.Helper.login();
    return false;
  });
});
</script> --}}


  
  

	
  	<div id="mainpage" class="main">
  		<div class="container">
  			<div class="row">
  			    
<div class="signup-form">
    <div class="header-signup-form">Tham gia vào VOER. Thoả sức sáng tạo.</div>
    <form method="post" action="{{ route('register.store') }}" class="wide" id="registrationform"  enctype="multipart/form-data">
    @csrf
    <div class="content-signup-form">
        <!--
        <div class="title-signup-email">
            <span>hoặc đăng ký sử dụng thư điện tử của bạn</span>
        </div>
        -->
        
        <input class="form-control" id="id_username" type="text" name="username" maxlength="30" placeholder="Tên đăng nhập">
        <input class="form-control" id="id_email" type="email" name="email" placeholder="Email của bạn">

        <input class="form-control" id="id_last_name" type="text" name="last_name" maxlength="30" placeholder="Họ của bạn">

        <input class="form-control" id="id_first_name" type="text" name="first_name" maxlength="30" placeholder="Tên của bạn">

        <div class="form-wrap-password">
            <input class="form-control" id="id_password1" type="password" name="password" placeholder="Mật khẩu của bạn">
        </div>
        <input class="form-control" id="id_password2" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
        <input id="id_recaptcha" name="recaptcha" type="hidden" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LdFgK0UAAAAAGvabLP0hly9lAUziXeDi5Zhi-q9"></script>
        <script>
          grecaptcha.ready(function() {
              $('#registrationform').submit(function(e){
                  var $form = this;
                  e.preventDefault();
                  grecaptcha.execute('6LdFgK0UAAAAAGvabLP0hly9lAUziXeDi5Zhi-q9', {action: 'registrationform'}).then(function(token) {
                      $('#id_recaptcha').val(token);
                      $form.submit()
                  });
              })
          });
        </script>
        <span class="left clear">
            By registering you are agreeing to our <a class="link-blue">Terms of Use</a> and <a class="link-blue">Privacy Policy</a>.</span>
        <input class="btn btn-sign-up left clear" type="submit" value="Đăng ký">
    </div>
    </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
</div>
<script type="text/javascript">
$(document).ready(function(){
  $(document).on('change', '.chb_show_pass', function() {
    Voer.Helper.showPassword(this, '#id_password1, #id_password2');
  });
});
</script>

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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-533acc7f382c20b0"></script>
             
  			</div>
  		</div>
  	</div>
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-23600843-1', 'voer.edu.vn');
      ga('send', 'pageview');

    </script>
@endsection