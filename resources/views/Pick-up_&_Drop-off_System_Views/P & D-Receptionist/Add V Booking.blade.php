<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts & Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">


	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">

	  <!--Links for dropdowns-->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


	  <!-- These links the date picker-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">

	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">

		<div class="row" style="margin-top: 0%">
			<div class="col-md-3">

			</div>
			<div class="col-md-12">
				<h3 class="text-center text-muted">
					Pick-up & Drop-off System
				</h3>
				<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
				<hr>

			</div>
			<div class="col-md-3">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
					<li class="active">

						<a href={!! url('addbooking') !!}>Add vehicle booking</a>
					</li>
					{{--<li>
						<a href={!! url('finalizebooking') !!}>Finalize vehicle bookings</a>
					</li>--}}

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

					{{--<li class="dropdown pull-right">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Receptionist<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Edit Profile</a>
							</li>
							<li>
								<a href="login">Logout</a>
							</li>--}}
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
					</li>
				</ul>

			</div>

		</div>

		<br>

	@if (Session::has ('message'))
		<div class="alert alert-success">

			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{Session::get('message','')}}

		</div>

		@elseif (Session::has ('exceptionerr'))
			<div class="alert alert-danger">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Failed : </strong> {{Session::get('exceptionerr','')}}

			</div>

		@elseif (Session::has ('vehiclesnotavailable'))
			<div class="alert alert-danger">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Failed : </strong> {{Session::get('vehiclesnotavailable','')}}

			</div>

		@elseif (Session::has ('driversnotavailable1'))
			<div class="alert alert-danger">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Failed : </strong> {{Session::get('driversnotavailable1','')}}

			</div>

		@elseif (Session::has ('available'))
			<div class="alert alert-success">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Success : </strong> {{Session::get('available','')}}

			</div>

		@endif


		<form method="post" class="form-horizontal" role="form" action={!! url('checkavailability') !!} ><input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group" style="margin-left: 4%;margin-top: 5%">


			<label for="departure" class="col-sm-2" style="font-size: larger">
				Service Date
			</label>

			<div class="col-sm-3">
				<input type="date" readonly  class="form-control" id="datepicker" name="service_date" placeholder="Select the date" style="margin-left: -17%"
					   value= @if(session('date'))
					   {{session('date')}}
					   @else "{{ old('service_date') }}"
						@endif >
				@if ($errors->has('service_date')) <p style="margin-left: -17%;width: 100%" class="alert-danger">{{ $errors->first('service_date') }}</p>@else<br> @endif

			</div>

				<label for="departure" class="col-sm-2" style="font-size: larger">
					Service Time
				</label>

				<div class="col-sm-3">
					<input type="date"  class="form-control" id="timepicker" name="service_time" placeholder="Select the time" style="margin-left: -17%"
						   value= @if(session('time'))
						   {{session('time')}}
						   @else "{{ old('service_time') }}"
							@endif >
					@if ($errors->has('service_time')) <p style="margin-left: -17%;width: 100%" class="alert-danger">{{ $errors->first('service_time') }}</p>@else<br> @endif




				</div>

				<button type="submit" class="btn btn-info btn-sm  col-sm-1 " style="width: 12%; margin-left: -2%">
					Check Availability
				</button>

				</div>
				</form>

		<hr>

		<form method="post" class="form-horizontal" role="form" action={!! url('reservations') !!} ><input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row" style="margin-top: 5%;">
				<div class="col-md-6">
					<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Guest Name
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" readonly id="guest_name" name="guest_name"
								   value= @if(session('g_name'))
								   {{session('g_name')}}
								   @else "{{ old('guest_name') }}"
									@endif >
							@if ($errors->has('guest_name')) <p class="alert-danger">{{ $errors->first('guest_name') }}</p>@else <br>@endif

						</div>

						<a class="btn btn-default"  href={!! url('/getprofile') !!} style="width:16%">Get Profile</a>

					</div>

					<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Reservation ID
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" readonly id="res_id" name="res_id"
								   value= @if(session('res_id'))
								   			{{session('res_id')}}
								          @else "{{ old('res_id') }}"
									      @endif >

							@if ($errors->has('res_id')) <p class="alert-danger">{{ $errors->first('res_id') }}</p>@else <br>@endif

						</div>

					</div>

					<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Member ID
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" readonly id="mem_id" name="mem_id"
								   value= @if(session('m_id'))
								   {{session('m_id')}}
								   @else "{{ old('mem_id') }}"
									@endif >

							@if ($errors->has('mem_id')) <p class="alert-danger">{{ $errors->first('mem_id') }}</p>@else <br>@endif

						</div>

					</div>

					<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Mobile No.
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" readonly id="tel_no" name="tel_no"
								   value= @if(session('t_no'))
								   {{session('t_no')}}
								   @else "{{ old('tel_no') }}"
									@endif >
							@if ($errors->has('tel_no')) <p class="alert-danger">{{ $errors->first('tel_no') }}</p>@else <br>@endif

						</div>

					</div>

					{{--<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Pick-up Position
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" id="pickup_position" name="pickup_position" value="{{ old('pickup_position')}}">
							@if ($errors->has('pickup_position')) <p class="alert-danger">{{ $errors->first('pickup_position') }}</p>@else <br>@endif

						</div>

					</div>

					<div class="form-group">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Destination
						</label>

						<div class="col-sm-6">

							<input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination')}}">
							@if ($errors->has('destination')) <p class="alert-danger">{{ $errors->first('destination') }}</p>@else <br>@endif

						</div>

					</div>--}}

				</div>


				<div class="col-md-6" style="margin-right:0">

					<div class="form-group" style="margin-left: 10%">



							<label for="country_list" class="col-sm-4" style="font-size: large">
								Vehicle
							</label>

							<div class="btn-group col-sm-7">
								<select class="form-control"  name="vehicle_no" id="vehicle_no">
									{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
									<option value="Select a vehicle">Select a vehicle </option>

									@if(session()->has('available_vehicles'))

									@foreach (session('available_vehicles') as $vehicle)
										<option value="{{$vehicle -> vehicle_no}}">{{$vehicle -> vehicle_no}}</option>
									@endforeach

									@endif

								</select>
								@if ($errors->has('vehicle_no')) <p class="alert-danger">{{ $errors->first('vehicle_no') }}</p>@else <br>@endif

							</div>


						</div>



					<div class="form-group" style="margin-left: 10%">



						<label for="country_list" class="col-sm-4" style="font-size: large">
							Driver
						</label>

						<div class="btn-group col-sm-7">
							<select class="form-control"  name="driver_name" id="driver_name">
								{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
								<option value="Select a driver">Select a driver </option>
								@if(session()->has('available_drivers'))

									@foreach (session('available_drivers') as $driver)
										<option value="{{$driver -> driver_id}}">{{$driver -> fname}} {{$driver -> lname}}</option>
									@endforeach

								@endif

							</select>
							@if ($errors->has('driver_name')) <p class="alert-danger">{{ $errors->first('driver_name') }}</p>@else <br>@endif

						</div>


					</div>

					<div class="form-group" style="margin-left: 10%">



						<label for="country_list" class="col-sm-4" style="font-size: large">
							Package
						</label>

						<div class="btn-group col-sm-7">
							<select class="form-control"  name="package" id="package">
								{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
								<option value="Select a package">Select a package </option>

									@foreach ($vehicle_packages as $vehicle_packages)
										<option value="{{$vehicle_packages -> package_name}}">{{$vehicle_packages -> package_name}}</option>
									@endforeach



							</select>
							@if ($errors->has('package')) <p class="alert-danger">{{ $errors->first('package') }}</p>@else <br>@endif

						</div>


					</div>

					<div class="form-group" style="margin-left: 10%">

						<label for="Name" class="col-sm-4" style="font-size: larger">
							Package Price
						</label>

						<div class="col-sm-7">

							<input type="text" class="form-control"  id="package_price" name="package_price" value="{{ old('package_price')}}">
							@if ($errors->has('package_price')) <p class="alert-danger">{{ $errors->first('package_price') }}</p>@else <br>@endif

						</div>

					</div>

			</div>

			<div class="row" style="margin-top: 25%;margin-left: 5%">
				<div class="col-md-12">


					<div class="col-sm-4">
					</div>



					<button type="submit" class="btn btn-primary  col-sm-1 ">
						Submit
					</button>

					<div class="col-sm-1">
					</div>

					<div class="btn-group col-sm-1">
						<a class="btn btn-warning  btn-block" href="{!! url('welcomereceptionist') !!}" style="width:150%;margin-top:2%">Cancel
						</a>
					</div>


				</div>

			</div>
		</div>

		</form>

		{{--To clear the auto filled text boxes after the session ends--}}
		{{Session::forget('g_name')}}
		{{Session::forget('res_id')}}
		{{Session::forget('m_id')}}
		{{Session::forget('t_no')}}




		<script>

			$('#package').on('change',function(e){
				console.log(e);

				var po=e.target.value;
				console.log(po);
				$.get('/reservations?package='+po,function(data){

					//get rate per KM by vehicle_no
					$.each(data,function(index, zoneObj){
						document.getElementById("package_price").value=zoneObj.package_price;
					});


				});
			});

		</script>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

	<!--Don't use this link! It will affect the drop downs
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		-->
	<!--Links for Time picker-->
	<script src="https://raw.githubusercontent.com/moment/moment/develop/moment.js"></script>
	<script src="https://raw.githubusercontent.com/moment/moment/master/locale/id.js"></script>
	<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

	<!--Functions of date and timepicker-->

		<script>
			$(function() {
				$( "#datepicker" ).datepicker({
					minDate:0,
					dateFormat: 'yy-mm-dd',
					changeMonth: true,
					changeYear: true,


				});



			});

		</script>

	<script>
		$(function () {
			$('#timepicker').datetimepicker({
				format: 'H:mm'
			});
		});

	</script>
</div>

  </body>
</html>