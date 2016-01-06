<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts & Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <!--<body style="background-image: url('http://localhost:8888/2.jpg');background-size: 100%";>

   <div class="container-fluid" style="margin-top: 2%">
       <button type="submit" class="btn btn-default" style="margin-top:1%;margin-left: 95%">
           Logout
       </button>-->

  <body>

  <div class="container">

  <div class="col-md-12">
	  <h3 class="text-muted text-center">
		  Pick-up & Drop-off System
	  </h3>
	  <img src="{{asset('common/logo-amaya.jpg')}}" style="width: 4%;margin-top: -4%">
	  <hr>

	  <ul class="nav nav-tabs">
		  <li>

			  <a href={!! url('addbooking') !!}>Add vehicle booking</a>
		  </li>

		  <li>
			  <a href={!! url('updatebooking') !!}>Update vehicle bookings</a>
		  </li>

		  <li>
			  <a href={!! url('pendingpaymenthandling') !!}>Payment handling</a>
		  </li>

		  <li>
			  <a href={!! url('viewbookings') !!}>View vehicle bookings</a>
		  </li>

		  <li>
			  <a href={!! url('availablevehicles') !!}>View available vehicles</a>
		  </li>
		  <li>
			  <a href={!! url('availabledrivers') !!}>View available drivers</a>
		  </li>

		  <li class="active" style="margin-left: 39%;margin-top: 2%">
			  <a href={!! url('finalizebooking') !!}><b>Finalize vehicle bookings</b></a>
		  </li>

		  {{--<li class="dropdown pull-right">
			  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Receptionist<strong class="caret"></strong></a>
			  <ul class="dropdown-menu">
				  <li>
					  <a href="#">Edit Profile</a>
				  </li>
				  <li>
					  <a href={!! url('login') !!}>Logout</a>
				  </li>
				<!--<li class="dropdown pull-right">
					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#">Separated link</a>
						</li>     -->
					</ul>
				</li>--}}
			</ul>
			<form method="post" class="form-horizontal" role="form" action={!! url('finalize') !!} style="margin-top:5%">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">





				<div class="form-group">

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Vehicle Res ID
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="v_res_id" name="v_res_id"
							   value= @if(session('v_id'))
							   {{session('v_id')}}
							   @else "{{ old('v_res_id') }}"
								@endif >

						@if ($errors->has('v_res_id')) <p class="alert-danger">{{ $errors->first('v_res_id') }}</p>@else <br>@endif

					</div>

					<div class="col-sm-1"></div>

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Reservation ID
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="res_id" name="res_id"
							   value= @if(session('res_id'))
							   {{session('res_id')}}
							   @else "{{ old('res_id') }}"
								@endif >

						@if ($errors->has('res_id')) <p class="alert-danger">{{ $errors->first('res_id') }}</p>@else <br>@endif

					</div>

				</div>

				<div class="form-group">

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Vehicle No.
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="vehicle_no" name="vehicle_no"
							   value= @if(session('veh_no'))
							   {{session('veh_no')}}
							   @else "{{ old('vehicle_no') }}"
								@endif >

						@if ($errors->has('vehicle_no')) <p class="alert-danger">{{ $errors->first('vehicle_no') }}</p>@else <br>@endif

					</div>

					<div class="col-sm-1"></div>


					<label for="Name" class="col-sm-2" style="font-size: larger">
						Member ID
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="mem_id" name="mem_id"
							   value= @if(session('m_id'))
							   {{session('m_id')}}
							   @else "{{ old('mem_id') }}"
								@endif >

						@if ($errors->has('mem_id')) <p class="alert-danger">{{ $errors->first('mem_id') }}</p>@else <br>@endif

					</div>



				</div>


				<div class="form-group">

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Package Price
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="package_price" name="package_price"
							   value= @if(session('pack_price'))
							   {{session('pack_price')}}
							   @else "{{ old('package_price') }}"
								@endif >
						@if ($errors->has('package_price')) <p class="alert-danger">{{ $errors->first('package_price') }}</p>@else <br>@endif

					</div>

					<div class="col-sm-1"></div>

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Package
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="package" name="package"
									value= @if(session('pack'))
										{{session('pack')}}
									@else "{{ old('package') }}"
									@endif >
						@if ($errors->has('package')) <p class="alert-danger">{{ $errors->first('package') }}</p>@else <br>@endif

					</div>




				</div>

				<div class="form-group">

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Additional Charage
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" id="additional" name="additional" value="{{ old('additional')}}">
						@if ($errors->has('additional')) <p class="alert-danger">{{ $errors->first('additional') }}</p>@else <br>@endif

					</div>

					<div class="col-sm-1"></div>

					<label for="Name" class="col-sm-2" style="font-size: larger">
						Total Price
					</label>

					<div class="col-sm-3">

						<input type="text" class="form-control" readonly id="total_price" name="total_price" value="{{ old('total_price')}}">
						@if ($errors->has('total_price')) <p class="alert-danger">{{ $errors->first('total_price') }}</p>@else <br>@endif

					</div>

				</div>

				<div class="row" style="margin-top: 5%;margin-left: 28%">
					<div class="col-md-12">




						<div class="btn-group col-sm-1" style="margin-left: 4%">
							<a class="btn btn-group btn-primary  btn-block" onclick="myFunction()"  style="width:240%">Calculate
							</a>
						</div>

						<div class="btn-group col-sm-1" style="margin-left: 8%">
							<a class="btn btn-group btn-warning  btn-block" href={!! url('welcomereceptionist') !!} style="width:240%">Cancel
							</a>
						</div>


						{{--Using the session to finalize the bookings after clicking the submit button--}}

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="v" value="{{ session('v_id') }}">
							<button class="btn btn-primary" type="submit" style="margin-left: 10%;width:11%" name="btn" value="submit">Submit</button>






					</div>

				</div>



			</form>

			</div>
		</div>

  {{--To clear the auto filled text boxes after the session ends--}}
  {{Session::forget('res_id')}}
  {{Session::forget('m_id')}}
  {{Session::forget('v_id')}}
  {{Session::forget('veh_no')}}
  {{Session::forget('pack')}}
  {{Session::forget('pack_price')}}


  <script>

	  function myFunction()
	  {
		  var price = document.getElementById('package_price').value;
		  var additional = document.getElementById('additional').value;
		  var total = +price + +additional;

		  document.getElementById('total_price').value = total;
	  }

	  {{Session::forget('date')}}
	  {{Session::forget('time')}}
  </script>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>