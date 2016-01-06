<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts and Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

  </head>
  <body>

    <div class="container">
		<div class="row">

			<div class="col-md-3">
			</div>
			<div class="col-md-12">
				<h3 class="text-center text-muted">
					Front Office Management System
				</h3>
				<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
				<hr>
				<h4 class="text-center text-muted">
					Rates
				</h4>


			</div>
			<div class="col-md-3" align="left">
				<div class="btn-group">
					<a class="btn btn-default  btn-block" href={!! url('/FO_mainpage') !!} style="width:100%">Home
					</a>
				</div>
			</div>
		</div>



		<div class="row" style="margin-top: 1%">

			<div class="col-md-4">
				<h3 class="text-primary text-center">
					Superior
				</h3>

				<div class="carousel slide" id="carousel-463888">

					<ol class="carousel-indicators">

						<li class="active" data-slide-to="0" data-target="#carousel-463888">
						</li>
						<li data-slide-to="1" data-target="#carousel-463888">
						</li>
						<li data-slide-to="2" data-target="#carousel-463888">
						</li>
						<li data-slide-to="3" data-target="#carousel-463888">
						</li>
					</ol>

					<div class="carousel-inner" >
						<div class="item active" style="width: 100%;height: 100%;">
							<img width="377px" alt="Carousel Bootstrap First" src="{{ asset('FO_superior_images/superior1.png') }}" height="248px" >
						</div>

						<div class="item" style="width: 100%;height: 100%;">
							<img alt="Carousel Bootstrap Second" src="{{ asset('FO_superior_images/superior2.png') }}">
						</div>

						<div class="item" style="width: 100%;height: 100%;">
							<img alt="Carousel Bootstrap Third" src="{{ asset('FO_superior_images/superior3.png') }}">
						</div>

						<div class="item" style="width: 100%;height: 100%;">
							<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_superior_images/superior4.png') }}">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-463888" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-463888" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>



				<dl style="margin-top: 8%">
					<dt>
						Room Details
					</dt>
					<dd>
						The bathrooms consist of a bath tub, shower and other bath amenities. <br>
						Size: 32SqFt
						<br>

					</dd>
					<dd></dd>
					<dt>
						Amenities
					</dt>
					<dd>
						King Bed,
						Balcony,
						Mountain View,
						Temperature Control,
						Free wifi,
						Bathroom,
						Cable TV,
						Coffeemaker,
						Cribs Available,
						Fireplace,
						Garden View,
						Hairdryer In Room,
						Iron,
						Sitting Area,
						Telephone,
						Toilet
					</dd>
					<dd>

					</dd>
					<dt>
						Rate Details
					</dt>
					<dd>
						@foreach( $superior as $sup)
						<li>{{	$sup->stay_type}} : $ {{ number_format($sup->rate,2)}}</li>
						@endforeach
					</dd>

				</dl>
			</div>



			<div class="col-md-4">
				<h3 class="text-primary text-center">
					Deluxe
				</h3>
				<div class="carousel slide" id="carousel-170192">
					<ol class="carousel-indicators">
						<li class="active" data-slide-to="0" data-target="#carousel-170192">
						</li>
						<li data-slide-to="1" data-target="#carousel-170192">
						</li>
						<li data-slide-to="2" data-target="#carousel-170192">
						</li>
						<li data-slide-to="2" data-target="#carousel-170192">
						</li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img alt="Carousel Bootstrap First" src="{{ asset('FO_deluxe_images/deluxe1.png') }}">
							<div class="carousel-caption">
								<h4>


								</h4>
								<p>

								</p>
							</div>
						</div>
						<div class="item">
							<img alt="Carousel Bootstrap Second" src="{{ asset('FO_deluxe_images/deluxe2.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>
						<div class="item">
							<img alt="Carousel Bootstrap Third" src="{{ asset('FO_deluxe_images/deluxe3.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>

						<div class="item">
							<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_deluxe_images/deluxe4.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>
					</div>

					<a class="left carousel-control" href="#carousel-170192" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-170192" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>

				<dl style="margin-top: 8%">
					<dt>
						Room Details
					</dt>
					<dd>
						 Size: 14.45 SQFT
						<br>
						<br>

					</dd>
					<dd></dd>
					<dt>
						Amenities
					</dt>
					<dd>
						Queen Bed,
						Balcony,
						Mountain View,
						Temperature Control,
						Free wifi,
						Bathroom,
						Bathroom Telephone,
						Cable TV,
						Coffeemaker,
						Cribs Available,
						Fireplace,
						Garden View,
						Hairdryer In Room,
						Iron,
						Prayer Mats,
						Sitting Area,
						Telephone,
						Toilet

					</dd>
					<dd>

					</dd>
					<dt>
						Rate Details
					</dt>
					<dd>
						@foreach( $deluxe as $del)
							<li>{{	$del->stay_type}} : $ {{ number_format($del->rate,2)}}</li>
						@endforeach

					</dd>

				</dl>
			</div>



			<div class="col-md-4">
				<h3 class="text-center text-primary ">
					Luxury
				</h3>
				<div class="carousel slide" id="carousel-646810">
					<ol class="carousel-indicators">
						<li class="active" data-slide-to="0" data-target="#carousel-646810">
						</li>
						<li data-slide-to="1" data-target="#carousel-646810">
						</li>
						<li data-slide-to="2" data-target="#carousel-646810">
						</li>
						<li data-slide-to="3" data-target="#carousel-646810">
						</li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img alt="Carousel Bootstrap First" src="{{ asset('FO_luxury_images/luxury1.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>

						<div class="item">
							<img alt="Carousel Bootstrap Second" src="{{ asset('FO_luxury_images/luxury2.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>

						<div class="item">
							<img alt="Carousel Bootstrap Third" src="{{ asset('FO_luxury_images/luxury3.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>

						<div class="item">
							<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_luxury_images/luxury4.png') }}">
							<div class="carousel-caption">
								<h4>

								</h4>
								<p>

								</p>
							</div>
						</div>
					</div>

						<a class="left carousel-control" href="#carousel-646810" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-646810" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>

				<dl style="margin-top: 8%">
					<dt>
						Room Details
					</dt>
					<dd>
						Size: 26.05 SqFt
						<br>
						<br>
						<br>
					</dd>
					<dd></dd>
					<dt>
						Amenities
					</dt>
					<dd>
						King Bed,
						Balcony,
						Mountain View,
						Temperature Control,
						Free wifi,
						Bathroom,
						Cable TV,
						Coffeemaker,
						Cribs Available,
						Fireplace,
						Garden View,
						Hairdryer In Room,
						Iron,
						Prayer Mats,
						Sitting Area,
						Telephone,
						Toilet,
					</dd>
					<dd>

					</dd>
					<dt>
						Rate Details
					</dt>
					<dd>
						@foreach( $luxury as $lux)
							<li>{{	$lux->stay_type}} : $ {{ number_format($lux->rate,2)}}</li>
						@endforeach

					</dd>

				</dl>
			</div>
		</div>
	</div>

  </body>
</html>