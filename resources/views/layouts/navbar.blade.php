<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/frontend/css/user-style.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('/frontend/css/style2.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('/frontend/css/drop-down.css') }}">
<style>
  .main-sidebar{
    background: #179046;
    width:30%;
  }
  li{
    text-decoration: none
  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <br>
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                  <a href="/welcome" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Trang chủ</p>
                  </a>
              </li>

              <li class="nav-item has-treeview">
                  <a href="{{ route('introduce.index') }}" class="nav-link menu-icon">
                    <i class="nav-icon fa-solid fa-comment-minus"></i>
                        <p>Giới thiệu</p>
                  </a>
              </li>

              <li class="nav-item has-treeview dropdown">

                <a href="#" data-toggle="dropdown">Đội ngũ nhân sự<i class="icon-arrow"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('manage.index', ['type' => 2]) }}">Đội ngũ vận hành</a></li>
                        <li><a href="{{ route('manage.index', ['type' => 1]) }}">Đội ngũ đầu tư</a></li>
                    </ul>
              </li>

              <li class="nav-item has-treeview">
                  <a href="{{ route('activities.index') }}" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-th-large"></i>
                      <p>Hoạt động đoàn thể</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-cart-plus"></i>
                      <p>Dịch vụ</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="{{ route('invest.index') }}" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-cart-plus"></i>
                      <p>Phương pháp đầu tư</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Thông điệp từ CEO</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="{{ route('chart') }}" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-desktop"></i>
                      <p>Hiệu quả đầu tư</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{ route('report') }}" class="nav-link menu-icon">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>Báo cáo chung</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{ route('activities.notice') }}" class="nav-link menu-icon">
                  <i class="nav-icon fas fa-desktop"></i>
                  <p>Thông báo</p>
              </a>
          </li>
              <li class="nav-item has-treeview dropdown">

                <a href="#" data-toggle="dropdown">VIDEO<i class="icon-arrow"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('activities.video', ['category' => 'hoi-nghi-nha-dau-tu']) }}">Diễn đàn - hội nghị</a></li>
                        <li><a href="{{ route('activities.video', ['category' => 'video']) }}">Video</a></li>
                    </ul>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link menu-icon">
                      <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>Thoát</p>

                  </a>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
      {{-- <script>
          function show(value) {
                document.querySelector(".text-box").value = value;
            }
            
            let dropdown = document.querySelector(".dropdown")
            dropdown.onclick = function() {
                dropdown.classList.toggle("active")
            }
      </script> --}}

      <script>
        // Dropdown Menu
var dropdown = document.querySelectorAll('.dropdown');
var dropdownArray = Array.prototype.slice.call(dropdown,0);
dropdownArray.forEach(function(el){
	var button = el.querySelector('a[data-toggle="dropdown"]'),
			menu = el.querySelector('.dropdown-menu'),
			arrow = button.querySelector('i.icon-arrow');

	button.onclick = function(event) {
		if(!menu.hasClass('show')) {
			menu.classList.add('show');
			menu.classList.remove('hide');
			arrow.classList.add('open');
			arrow.classList.remove('close');
			event.preventDefault();
		}
		else {
			menu.classList.remove('show');
			menu.classList.add('hide');
			arrow.classList.remove('open');
			arrow.classList.add('close');
			event.preventDefault();
		}
	};
})

Element.prototype.hasClass = function(className) {
    return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
};
      </script>
  </div>
  <!-- /.sidebar -->
</aside>