<!DOCTYPE html>
<html>
	<head>
		<title>
			Stadtmusik Lenzburg
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="/css/app.css">
		<link rel="stylesheet" type="text/css" href="/css/fonts.css">

	</head>
	<body>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.7";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div class="wrapper">
			<div class="container flex-grow">
				<div class="header row">
					<div class="col-lg-3 col-md-3 hidden-xs header-lg-left">
						<a href="/">
							<img src="/images/sml_punkt.bmp" class="img-responsive">
						</a>
					</div>
					<div class="col-lg-9 col-md-9 hidden-sm hidden-xs text-right header_img">
						<img src="/images/header_right.jpg">
					</div>

					<div class="col-xs-12 hidden-lg hidden-md hidden-sm colorized-header">
						<div class="xs-button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>

						<div class="xs-button-close">
							<i class="fa fa-times close-button" aria-hidden="true"></i>
						</div>

						<a href="/" class="mobile-header">
							<h1 class="header-xs">
								Stadtmusik
							</h1>
						</a>
					</div>

				</div>



					<div class="navigation row hidden-xs">
						@foreach($navigation as $nav)
							@if($nav->name !== 'Intern')
								<a href="{{ $nav->route }}">
									<div class="col-lg-2 col-md-2 col-sm-2 text-center navigation-button">
										{{ $nav->name }}
										@if(Request::is($nav->name))
											<div class="navigation-picker"></div>
										@endif
									</div>
								</a>
							@endif
						@endforeach
					</div>
					
					<div class="mobile-navigation row">
						<div class="col-xs-12">
							@foreach($navigation as $nav)
								@if($nav->name !== 'Intern')
									<div class="row">
										<div class="col-xs-12 {{ Request::is($nav->name) ? 'menu-active' : '' }}">
											<a class="menu-link" href="{{ $nav->route }}"><h4>{{ $nav->name }}</h4></a> 
										</div>
									</div>
								@else
									<div class="row">
										<div class="col-xs-12">
										</div>
									</div>
								@endif
							@endforeach	
						</div>
					</div>


				<div class="content">
					@yield('content')
				</div>

			</div>
			<div class="footer container">
				<div class="row">
					<div class="hidden-xs col-lg-3 col-md-3 col-sm-4">
						<div class="row">	
							<div class="col-xs-12 text-center footer-text">
								&copy; 2017 stadtmusik-lenzburg.ch
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-lg-9 col-md-9 col-sm-8 text-right">
						<div class="row">
							<div class="footer-button col-xs-12">
								<div class="fb-like" data-href="https://www.facebook.com/Concertband-Lenzburg-147810645243618/?fref=ts" data-width="120" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('.xs-button').click(function() {
			  	$('.content').hide();
			  	$('.xs-button').hide();
			  	$('.xs-button-close').show();
			  	$('.mobile-navigation').show();
			});

			$('.xs-button-close').click(function() {
			  	$('.content').show();
			  	$('.mobile-navigation').hide();
			  	$('.xs-button').show();
			  	$('.xs-button-close').hide();
			});
		</script>
	</body>
</html>
