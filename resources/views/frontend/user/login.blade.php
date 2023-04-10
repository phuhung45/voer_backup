<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập - Passion Investment</title>
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
		<header class="header">
			<nav class="navbar navbar-expand-lg" style="justify-content: center;">
				<class ="container">
					<div class="logo text-center">
						<a class="logo" href="/"><img src="/images/logo-pif.png" width="160" height="89" /></a>
					</div>
				</div>
			</nav>
		</header>
		<section class="login-form parallax-window" data-parallax="scroll" data-image-src="/images/login-bg.jpg" data-parallax="-7">
				<div class="container">
					<form id="login" action="{{ route('auth.login') }}" method="post">
						@csrf
						<label for="email">Email</label>
						<input id="email" class="form-control input input--lg w-full" name="email" type="email" value="">
						<label for="password">Password</label>
						<input id="password" class="form-control input input--lg w-full" name="password" type="password" autocomplete="off" autocapitalize="none" spellcheck="false">
						<button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Đăng nhập</button>
						<a class="color-gray text-small" href="/Password.action">Forgot password</a>
					</form>
				</div>
		</section>
		@include('layouts.includes.footer')
	</body>
</html>