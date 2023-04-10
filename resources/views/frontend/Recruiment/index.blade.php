<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tuyển dụng - Passion Investment</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link rel="stylesheet" href="/frontend/css/style.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </head>
<body>
	@include('layouts.includes.navbar')
    <div class="body-content">
		<div class="container">
			<div class="body-recruitment">
				<h1>Tuyển dụng</h1>
				<div class="blog recruitments">
					@foreach ($recruitment as $item)
					<div class="row recruitment-item blog-item box">
						<div class="box-image col-md-4">
							<a href="{{ route('recruitment.show', $item->slug) }}"><img src="images/thumbnail/{{ $item->images }}" alt="{!! $item->title !!}"></a>
						</div>
						<div class="box-content col-md-8">
							<h2 class="box-title">
								<a href="{{ route('recruitment.show', $item->slug) }}">{!! $item->title !!}</a>
							</h2>
							<p class="box-info text-small color-gray">Đăng vào {!! date('d/m/Y', strtotime($item->modified)) !!} </p>
							<p> {!! $item->introtext !!} </p>
							<a href="{{ route('recruitment.show', $item->slug) }}" class="btn btn-primary btn-sm">Xem thêm</a>
						</div>
					</div>
					@endforeach
				</div>
				{{ $recruitment->links("pagination::bootstrap-4") }}
			</div>
		</div>
    </div>
    @include('layouts.includes.footer')
</body>
</html>