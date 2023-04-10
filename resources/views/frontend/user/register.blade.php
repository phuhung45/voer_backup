@include('layouts.includes.navBar')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký - Passion Investment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <link rel="stylesheet" href="frontend/css/style.css">

    <!-- Styles -->
</head>
  <body>
    
    



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
    <div class="header-signup-form">Passion Investment - Đăng ký tài khoản</div>
    <br>
    <form method="post" action="{{ route('register.store') }}" class="wide" id="registrationform"  enctype="multipart/form-data">
    @csrf
    <div class="content-signup-form">
        <!--
        <div class="title-signup-email">
            <span>hoặc đăng ký sử dụng thư điện tử của bạn</span>
        </div>
        -->
        
        <input class="form-control" id="id_email" type="email" name="email" placeholder="Email của bạn">
        <div class="form-wrap-password">
            <input class="form-control" id="id_password1" type="password" name="password" placeholder="Mật khẩu của bạn">
        </div>
        <input class="form-control" id="id_password2" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">

        <input class="form-control" id="id_phone" type="text" name="phone" maxlength="30" placeholder="Số điện thoại của bạn">

        <input class="form-control" id="id_first_name" type="text" name="first_name" maxlength="30" placeholder="Họ của bạn">

        <input class="form-control" id="id_last_name" type="text" name="last_name" placeholder="Tên của bạn">

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

<!-- Modal -->
                
  			</div>
  		</div>
  	</div>
    @include('layouts.includes.footer')

  </body>
</html>
