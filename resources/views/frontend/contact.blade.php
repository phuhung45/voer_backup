<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liên hệ - Passion Investment</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link rel="stylesheet" href="frontend/css/style.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		<script src="/plugins/parallax/parallax.min.js" crossorigin="anonymous"></script>
    </head>
<body>
	@include('layouts.includes.navbar')
    <section class="contact parallax-window" data-parallax="scroll" data-image-src="/images/bg-contact.jpg" data-parallax="-7">
		<div class="container">
			<div class="form-group">
				<div class="notice">
					<h6>Đối với các vấn đề liên quan đến tuyển dụng vui lòng truy cập trang <a href="{{ route('recruitment') }}"><b>tuyển dụng</b></a> của chúng tôi.</h6>
					<h6>Đối với các vấn đề khác, vui lòng gửi biểu mẫu tại đây.</h6>
				</div>
				<div class="contact-form">
					<form id="form" action="" method="POST" enctype="multipart/form-data">
						@csrf
						<label for="name">Tên <b>*</b></label>
						<input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
						<label for="company">Công ty </label>
						<input type="text" name="company" class="form-control" id="company" value="{{ old('company') }}">
						<label for="email">Email <b>*</b></label>
						<input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
						<label for="phone">Số điện thoại</label>
						<input type="number" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
						<label for="reason">Lý do liên hệ <b>*</b></label>
						<textarea name="reason" class="form-control" id="reason">{!! old('reason') !!}</textarea>
						<button class="btn btn-primary">Xác nhận</button>
					</form>
				</div>
			</div>
		</div>
    </section>
	@include('layouts.includes.footer')
</body>