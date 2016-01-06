<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts & Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

	  <!--Links for dropdowns-->
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
  <div class="row">
	  <div class="col-md-12">

		  <h3 class="text-muted text-center">
			  Pick-up & Drop-off System
		  </h3>
		  <img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left:1%;width: 4%;margin-top: -4%">
		  <hr>

		  <ul class="nav nav-tabs">

			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage vehicle fleet<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('addvehicle') !!}>Add new vehicle</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('editvehicle') !!}>Edit vehicle details</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('removevehicle') !!}>Remove vehicles</a>
					  </li>

				  </ul>
			  </li>





			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage driver details<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('adddriver') !!}>Add new driver</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('editdriver') !!}>Edit driver details</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('removedriver') !!}>Remove drivers</a>
					  </li>

				  </ul>
			  </li>

			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage travelling packages<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('addpackage') !!}>Add new travelling package</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('updatepackage') !!}>Update travelling packages</a>
					  </li>

				  </ul>
			  </li>


			  <li class="active">

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage legal information<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li class="active">
						  <a href={!! url('addvehiclelegal') !!}>Add new vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('adddriverlegal') !!}>Add new driver legal info</a>
					  </li>

					  <li class="divider">
					  </li>

					  <li>
						  <a href={!! url('viewvehiclelegal') !!}>View vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('viewdriverlegal') !!}>View driver legal info</a>
					  </li>
					  <li class="divider">
					  </li>

					  <li>
						  <a href={!! url('updatevehiclelegal') !!}>Update vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('updatedriverlegal') !!}>Update driver legal info</a>
					  </li>
				  </ul>
			  </li>




			  {{--<li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Generate Reports<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('generatevehiclereservationreports') !!}>Generate reports on vehicle reservation</a>
					  </li>
					  <li class="divider">
					  <li>
						  <a href={!! url('generatevehiclereports') !!}>Generate reports on vehicle fleet</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('generatedriverreports') !!}>Generate reports on driver details</a>
					  </li>

				  </ul>
			  </li>--}}



				  </ul>
			  </li>
		  </ul>
	  </div>
  </div>
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


		<div class="row">
		<div class="col-md-11">
			<h4 class="text-muted" style="margin-top: 2%;margin-left: 1%">
				Add Vehicle Legal Information
			</h4>
		</div>


		<div class="col-md-1">
			<br>
			<a class="btn btn-default pull-right " style="margin-left: 82%" href={!! url('supervisorwelcome') !!} style="width:50%">Home
			</a>

		</div>
	</div>


	@if (Session::has ('exceptionerr'))
		<div class="alert alert-danger">

			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Failed : </strong> {{Session::get('exceptionerr','')}}

		</div>
	@endif



			<form method="post"  class="form-horizontal" style="margin-top: 5%" action={!! url('storevehiclelegal') !!}>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-md-12">
						<form role="form">

							<div class="form-group">

								<label   class="col-sm-2 control-label" style="font-size: larger">
									Vehicle No.
								</label>
								<div class="col-sm-5" style="margin-left: -1.25%">
									<div class="btn-group col-sm-7">
										<select class="form-control"  name="vehicle_no" id="vehicle_no">
											{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
											<option value="Select a vehicle">Select a vehicle </option>
											@foreach ($vehicles as $vehicle)
												<option value="{{$vehicle -> vehicle_no}}">{{$vehicle -> vehicle_no}}</option>
											@endforeach

										</select>
										@if ($errors->has('vehicle_no')) <p class="alert-danger">{{ $errors->first('vehicle_no') }}</p>@else <br>@endif

									</div>
								</div>
							</div>

							<div class="form-group">

								<label   class="col-sm-2 control-label" style="margin-top:2%;font-size: larger">
									Comment
								</label>
								<div class="col-sm-2" style="width: 23%">
									<textarea class="form-control custom-control" id="comment" name="comment" rows="3" style="	resize:none" value="{{ old('comment')}}">
								</textarea>
									@if ($errors->has('comment')) <p class="alert-danger">{{ $errors->first('comment') }}</p>@else @endif

								</div>
							</div>

							<div class="form-group">

								<label class="col-sm-2 control-label" style="font-size: larger;margin-top: 1.5%">
									Attach a file
								</label>
								</div>


							<div class="col-sm-2" style="width: 24%;margin-left: 0.75%">
								<input name="attachement" id="attachement" class="form-control" placeholder="" type="file" accept="application/pdf" style="margin-top: -18%;margin-left: 70%;height: 10%;color: red"/>

							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<br>
									<button type="submit" class="btn btn-primary">
										Submit
									</button>
								</div>

							</div>





						</form>
					</div>
				</div>


</form>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>