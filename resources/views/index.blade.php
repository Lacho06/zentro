<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@if ($preference)
		{{ $preference->name }}
	@else
		Zentro
	@endif</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nivo-lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nivo_themes/default/default.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">@if ($preference)
				{{ $preference->name }}
			@else
				ZENTRO
			@endif</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">HOME</a></li>
				<li><a href="#gallery" class="smoothScroll">FOOD GALLERY</a></li>
				<li><a href="#menu" class="smoothScroll">SPECIAL MENU</a></li>
				<li><a href="#place" class="smoothScroll">PLACE</a></li>
				<li><a href="#contact" class="smoothScroll">CONTACT</a></li>
			</ul>
		</div>
	</div>
</section>


<!-- home section -->
<section id="home" @if ($preference)
	style="background: url({{ 'storage/'.$preference->cover_image }}) 50% 0 repeat-y fixed !important;"
@endif class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				@if ($preference)
					<h1>{{ $preference->title }}</h1>
					<h2>{{ $preference->subtitle }}</h2>
				@else
					<h1>ZENTRO RESTAURANT</h1>
					<h2>CLEAN &amp; SIMPLE DESIGN</h2>
				@endif
				<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>
			</div>
		</div>
	</div>
</section>


<!-- gallery section -->
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Food Gallery</h1>
				<hr>
			</div>
			@if ($foods)
				@php
					$time = 0.3;
					$container = false;
				@endphp
				@foreach ($foods as $food)
					@if ($container == false && $loop->iteration % 3 != 0)
						@php
							$foodAux = $food;
							$container = true;
						@endphp
					@elseif ($container == true && $loop->iteration % 3 != 0)
						<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="{{ $time }}s">
							<a href="{{ asset('storage/'.$foodAux->image) }}" data-lightbox-gallery="zenda-gallery"><img width="400" height="300" src="{{ asset('storage/'.$foodAux->image) }}" alt="{{ $foodAux->name }}"></a>
							<div>
								<h3>{{ $foodAux->name }}</h3>
								<span>
									@foreach ($foodAux->ingredients as $ingredient)
										@if (!$loop->last)
											{{ $ingredient->name }}
											/
										@else
											{{ $ingredient->name }}
										@endif
									@endforeach
								</span>
							</div>
							<a href="{{ asset('storage/'.$food->image) }}" data-lightbox-gallery="zenda-gallery"><img width="400" height="300" src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}"></a>
							<div>
								<h3>{{ $food->name }}</h3>
								<span>
									@foreach ($food->ingredients as $ingredient)
										@if (!$loop->last)
											{{ $ingredient->name }}
											/
										@else
											{{ $ingredient->name }}
										@endif
									@endforeach
								</span>
							</div>
						</div>
						@php
							$container = false;
						@endphp
					@endif
					@if ($loop->iteration % 3 == 0)
						<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="{{ $time }}s">
							<a href="{{ asset('storage/'.$food->image) }}" data-lightbox-gallery="zenda-gallery"><img width="400" height="600" src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}"></a>
							<div>
								<h3>{{ $food->name }}</h3>
								<span>
									@foreach ($food->ingredients as $ingredient)
										@if (!$loop->last)
											{{ $ingredient->name }}
											/
										@else
											{{ $ingredient->name }}
										@endif
									@endforeach
								</span>
							</div>
						</div>
					@endif
					@php
						$time += 0.3;
					@endphp
				@endforeach

			@else
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
					<a href="{{ asset('images/gallery-img1.jpg') }}" data-lightbox-gallery="zenda-gallery"><img src="{{ asset('images/gallery-img1.jpg') }}" alt="gallery img"></a>
					<div>
						<h3>Lemon-Rosemary Prawn</h3>
						<span>Seafood / Shrimp / Lemon</span>
					</div>
					<a href="{{ asset('images/gallery-img2.jpg') }}" data-lightbox-gallery="zenda-gallery"><img src="{{ asset('images/gallery-img2.jpg') }}" alt="gallery img"></a>
					<div>
						<h3>Lemon-Rosemary Vegetables</h3>
						<span>Tomato / Rosemary / Lemon</span>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<a href="{{ asset('images/gallery-img3.jpg') }}" data-lightbox-gallery="zenda-gallery"><img src="{{ asset('images/gallery-img3.jpg') }}" alt="gallery img"></a>
					<div>
						<h3>Lemon-Rosemary Bakery</h3>
						<span>Bread / Rosemary / Orange</span>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
					<a href="{{ asset('images/gallery-img4.jpg') }}" data-lightbox-gallery="zenda-gallery"><img src="{{ asset('images/gallery-img4.jpg') }}" alt="gallery img"></a>
					<div>
						<h3>Lemon-Rosemary Salad</h3>
						<span>Chicken / Rosemary / Green</span>
					</div>
					<a href="{{ asset('images/gallery-img5.jpg') }}" data-lightbox-gallery="zenda-gallery"><img src="{{ asset('images/gallery-img5.jpg') }}" alt="gallery img"></a>
					<div>
						<h3>Lemon-Rosemary Pizza</h3>
						<span>Pasta / Rosemary / Green</span>
					</div>
				</div>
			@endif
		</div>
	</div>
</section>


<!-- menu section -->
<section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			@if (!$menu)
				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">Special Menu</h1>
					<hr>
				</div>
			@endif
			@if ($menu)
				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">{{ $menu->name }}</h1>
					<hr>
				</div>
				@if ($menu->foods)
					@foreach ($menu->foods as $food)
						<div class="col-md-6 col-sm-6">
							<h4>{{ $food->name }} ................ <span>${{ $food->price }}</span></h4>
							<h5>
								@foreach ($food->ingredients as $ingredient)
									@if (!$loop->last)
										{{ $ingredient->name }}
										/
									@else
										{{ $ingredient->name }}
									@endif
								@endforeach
							</h5>
						</div>
					@endforeach
				@else
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Vegetable ................ <span>$20.50</span></h4>
						<h5>Chicken / Rosemary / Lemon</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Meat ........................... <span>$30.50</span></h4>
						<h5>Meat / Rosemary / Lemon</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Pork ........................ <span>$40.75</span></h4>
						<h5>Pork / Tooplate / Lemon</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Orange-Rosemary Salad .......................... <span>$55.00</span></h4>
						<h5>Salad / Rosemary / Orange</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Squid ...................... <span>$65.00</span></h4>
						<h5>Squid / Rosemary / Lemon</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Orange-Rosemary Shrimp ........................ <span>$70.50</span></h4>
						<h5>Shrimp / Rosemary / Orange</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Prawn ................... <span>$110.75</span></h4>
						<h5>Chicken / Rosemary / Lemon</h5>
					</div>
					<div class="col-md-6 col-sm-6">
						<h4>Lemon-Rosemary Seafood ..................... <span>$220.50</span></h4>
						<h5>Seafood / Rosemary / Lemon</h5>
					</div>
				@endif
			@endif
		</div>
	</div>
</section>


<!-- place section -->
<section id="place" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Meet @if ($preference)
					{{ $preference->name }}
				@else
					Zentro
				@endif </h1>
				<hr>
			</div>
			@if ($places)
				@foreach ($places as $place)
					<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
						<img src="{{ asset('storage/'.$place->image) }}" class="img-responsive center-block" alt="{{ $place->name }}">
						<h3>{{ $place->name }}</h3>
					</div>
				@endforeach
			@else
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
					<img src="{{ asset('images/team1.jpg') }}" class="img-responsive center-block" alt="place img">
					<h3>Bar</h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<img src="{{ asset('images/team2.jpg') }}" class="img-responsive center-block" alt="place img">
					<h3>Hall</h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
					<img src="{{ asset('images/team3.jpg') }}" class="img-responsive center-block" alt="place img">
					<h3>Kitchen</h3>
				</div>
			@endif
		</div>
	</div>
</section>


<!-- contact section -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">Contact Us</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<form action="#" method="post">
					<div class="col-md-6 col-sm-6">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
                    </div>
					<div class="col-md-6 col-sm-6">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
					<div class="col-md-12 col-sm-12">
						<textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
					</div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="Make a reservation">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>


<!-- footer section -->
<footer @if ($preference)
	style="background: url({{ 'storage/'.$preference->back_image }}) 50% 0 repeat-y fixed !important;"
@endif class="parallax-section">
	<div class="container">
		<div class="row">
			@if ($preference)
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Contact Info.</h2>
					<div class="ph">
						<p><i class="fa fa-phone"></i> Phone</p>
						<h4>{{ $preference->phone }}</h4>
					</div>
					<div class="address">
						<p><i class="fa fa-map-marker"></i> Our Location</p>
						<h4>{{ $preference->location }}</h4>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Open Hours</h2>
						<p>Sunday <span>{{ $preference->open_sunday." - ".$preference->close_sunday }}</span></p>
						<p>Mon-Fri <span>{{ $preference->open_monday." - ".$preference->close_monday }}</span></p>
						<p>Saturday <span>{{ $preference->open_saturday." - ".$preference->close_saturday }}</span></p>
				</div>
			@else
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Contact Info.</h2>
					<div class="ph">
						<p><i class="fa fa-phone"></i> Phone</p>
						<h4>090-080-0760</h4>
					</div>
					<div class="address">
						<p><i class="fa fa-map-marker"></i> Our Location</p>
						<h4>120 Duis aute irure, California, USA</h4>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Open Hours</h2>
						<p>Sunday <span>10:30 AM - 10:00 PM</span></p>
						<p>Mon-Fri <span>9:00 AM - 8:00 PM</span></p>
						<p>Saturday <span>11:30 AM - 10:00 PM</span></p>
				</div>
			@endif
            @if ($preference)
                <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                    <h2 class="heading">Follow Us</h2>
                    <ul class="social-icon">
                        <li><a href="{{ $preference->facebook_link }}" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                        <li><a href="{{ $preference->instagram_link }}" class="fa fa-whatsapp wow bounceIn" data-wow-delay="0.6s"></a></li>
                        <li><a href="{{ $preference->whatsapp_link }}" class="fa fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
                        {{-- <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li> --}}
                        {{-- <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li> --}}
                    </ul>
                </div>
            @else
                <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                    <h2 class="heading">Follow Us</h2>
                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                        <li><a href="#" class="fa fa-whatsapp wow bounceIn" data-wow-delay="0.6s"></a></li>
                        <li><a href="#" class="fa fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
                        {{-- <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li> --}}
                        {{-- <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li> --}}
                    </ul>
                </div>
            @endif
		</div>
	</div>
</footer>


<!-- copyright section -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				@if ($preference)
					<h3>{{ $preference->name }}</h3>
					<p>Copyright © {{ $preference->name }} Restaurant
						| Design: <a rel="nofollow" href="http://github.com/Lacho06" target="_parent">Lacho06dev</a></p>
				@else
					<h3>ZENTRO</h3>
					<p>Copyright © Zentro Restaurant and Cafe

					| Design: <a rel="nofollow" href="http://github.com/Lacho06" target="_parent">Lacho06dev</a></p>
				@endif
			</div>
		</div>
	</div>
</section>

<!-- JAVASCRIPT JS FILES -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.parallax.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/nivo-lightbox.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
