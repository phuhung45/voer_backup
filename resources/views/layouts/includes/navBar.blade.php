<link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/templates.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slide.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/flat-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/font.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/display-mathml.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery/jRating/jRating.jquery.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <script type="text/javascript" src="/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/bootstrap-select.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/flatui-checkbox.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/common.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/application.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/frontend/js/display-mathml.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/jRating.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.materials.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/voer.search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/frontend/js/jquery.bootstrap-growl.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="top" class="navbar navbar-default navbar-fixed-top">
    <div class="donate" style="background-color: #404040; text-align:right;padding-right:10%" ><a href="https://vnfoundation.org/donate"><i class="fa fa-heart" aria-hidden="true"></i>Donate to VNFoundation</a></div>
    <div class="container main">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle btn-search  hidden-home " data-toggle="collapse" data-target=".search-collapse">
                <span class="icon-search"></span>
            </button>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="/">Project name</a>
        </div>
        <div class="search-collapse collapse  hidden-home ">
            <div class="div-input-search left clear">
                <form action="{{route('search')}}" method="GET">
                    <input type="text" class="input-search-top" name="keyword" value="">
                    <input type="submit" class="hfbtn-common search-index" value="search">
                </form>
            </div>
        </div>
		<div id="main-menu" class="navbar-collapse collapse">
            <ul class="nav navbar-nav main-menu-nav">
                <li class="">
                    <a href="{{route('home')}}">{!! trans('lang.home') !!}</a>
                </li>
                <li>
                    <a href="{{route('browse.index')}}">{!! trans('lang.browse') !!}</a>
                </li>
                <li>
                  
                    <a href="{{route('donggop')}}">{!! trans('lang.contribute') !!}</a>
                  
                </li>
                <li>
                  
                    <a href="{{route('about')}}">{!! trans('lang.about') !!}</a>
                  
                </li>

                @if (!empty (auth('front')->user()))
                <li>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Viết bài
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                     
                                <p>
                                    <a href="{{route('register.write', ['id' => auth('front')->user()->id])}}">{!! trans('lang.write') !!}</a>
                                </p>
                       
                                <p>
                                    <a href="{{route('browse.create')}}">{!! trans('lang.collection') !!}</a>
                                </p>
                       
                        </div>
                      </div>
                </li>
                    {{-- <li>
                        <a href="{{route('register.write', ['id' => auth('front')->user()->id])}}">{!! trans('lang.write') !!}</a>
                      
                    </li>
                    <li>
                        <a href="{{route('browse.create')}}">{!! trans('lang.collection') !!}</a>
                      
                    </li> --}}
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right list-right-top hidden-sm">
                
                <li id="input-search-right-top">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" class="input-search-right-top" name="keyword" value="">
                    </form>
                </li>
                

                    <li>
                        <div class="collapse navbar-collapse bs-js-navbar-collapse">
                                
                                <ul style="margin-top:-10px">
                                    @if (app()->getLocale() == 'en')
                                    <li>
                                        <form name="setLangVietnamese" action="{{ route('locale', ['locale' => 'vi']) }}" method="GET"><input type="hidden" name="csrfmiddlewaretoken" value="">
                                            @csrf
                                            <input name="next" type="hidden" value="">
                                            <input type="hidden" name="language" value="vi">
                                            <a href="" onclick="document.setLangVietnamese.submit();return false;"><img src="/images/vi.jpg" alt="Tiếng Việt" title="Tiếng Việt"></a>
                                        </form>
                                    </li>
                                    @elseif(app()->getLocale() == 'vi')
                                    <li>
                                        <form name="setLangEnglish" action="{{ route('locale', ['locale' => 'en']) }}" method="GET"><input type="hidden" name="csrfmiddlewaretoken" value="">
                                            @csrf
                                            <input name="next" type="hidden" value="">
                                            <input type="hidden" name="language" value="en">
                                            <a href="" onclick="document.setLangEnglish.submit();return false;"><img src="/images/us.png" alt="English" title="English"></a>
                                        </form>
                                    </li>
                                </ul>
                        </div>
                        @endif
                    </li>

                    @if (!empty(auth('front')->user()))
                    <ul class="navbar-nav ml-auto" style="padding-top: 15px">
                        <!-- Navbar Search -->
                        <li class="nav-item dropdown">

                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="dropdown-divider">
                                    <h6>Xin chào <b>{{ auth('front')->user()->fullname }}</b></h6>
                                </div>
                  
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('register.show', ['id' => auth('front')->user()->id]) }}" class="dropdown-item">
                                    <i class="fa-solid fa-user-plus"></i> Thông tin tài khoản
                                </a>

                                <a href="{{ route('register.write', ['id' => auth('front')->user()->id]) }}" class="dropdown-item">
                                    <i class="fa-solid fa-pen" style="padding-right: 7px"></i>Viết tài liệu
                                </a>
                                <a href="{{route('browse.create')}}" class="dropdown-item">
                                    <i class="fa-solid fa-pen" style="padding-right: 7px"></i>Viết giáo trình
                                </a>
                                <a href="{{ route('profile', ['id' => auth('front')->user()->id]) }}"
                                    class="dropdown-item">
                                    <i class="fa-solid fa-list" style="padding-right: 7px"></i>Tài liệu / giáo trình
                                </a>
                                {{-- <br> --}}
                                <a href="{{ url('/user/logout') }}" class="dropdown-item">
                                    <i class="fa fa-sign-out" aria-hidden="true" style="margin-right: 5px;"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>

                    @else
                    <li>
                        {{-- Dùng hàm trans này dựa theo nội dung file lang  --}}
                        <a href="/user/register">{{ trans('lang.register') }}</a>
                    </li>
                    <li class="">
                        <a class="btn-top-login" data-toggle="modal" data-target="#modal-user-login">{!! trans('lang.login') !!}</a>
                    </li>
                    @endif
                </ul>
            </div>
    </div>
    <!--END RIGHT TOP-->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-user-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header padding-content-15">
                <h4 class="modal-title" id="myModalLabel">{!! trans('lang.login_voer') !!}</h4>
            </div>
            <form action="{{ route('user.login') }}" method="POST" id="login-form">
                @csrf
                <div class="modal-body padding-content-15">
                    <input type='hidden' name='csrfmiddlewaretoken' value='bbF34wQ7015PBhvnL8XWx8byUdetximu' />
                    <input type="text" class="form-control" placeholder="{!! trans('lang.username') !!}" name="username">
                    <input type="password" class="form-control" placeholder="{!! trans('lang.password') !!}" name="password">
                    <ul class="list-user-login-tools">
                        <li>
                            <label class="checkbox checkbox-user-tool">
                      <span class="icons">
                          <span class="first-icon fui-checkbox-unchecked"></span>
                          <span class="second-icon fui-checkbox-checked"></span>
                      </span>
                                <input type="checkbox" data-toggle="checkbox">
                                {!! trans('lang.remember') !!}
                            </label>
                        </li>
                        <li class="right">
                            <a href="/user/password/reset/">{!! trans('lang.forgot') !!}</a>
                        </li>
                    </ul>
                    <button type="submit" name="login" class="btn btn-primary btn-login-submit">{!! trans('lang.login') !!}</button>
                </div>
                <div class="modal-footer">
                    <a class="btn-form-login-signup left" href="/user/register">{!! trans('lang.notice') !!}</a>

                    <div class="alert-modal-login left padding-content-10 hidden"><!-- Add class 'hidden' to hide alert -->
                        <span class="left">{!! trans('lang.alert') !!}</span>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
        <style type="text/css">
            @media only screen and (max-width: 767px) {
                ul.nav.navbar-nav.main-menu-nav {
                background-color: #ce204e;
            }
            .dropdown-menu.dropdown-menu-lg.dropdown-menu-right {
                background-color: #ce204e;
                padding-left: 86px;
                display: inline-grid;
            }
            }
        </style>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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