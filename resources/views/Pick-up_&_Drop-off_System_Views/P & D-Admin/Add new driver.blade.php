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





			  <li  class="active">

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage driver details<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li class="active">
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



			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage legal information<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
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

		  </div>

			 {{-- <li class="dropdown pull-right">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Transport Supervisor<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href="#">Edit Profile</a>
					  </li>
					  <li>
						  <a href={!! url('login') !!}>Logout</a>
					  </li>
				  </ul>
			  </li>--}}






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


	<div class="row">
		<div class="col-md-11">
			<h4 class="text-muted" style="margin-top: 2%;margin-left: 1%">
				Add New Driver
			</h4>
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
			<strong>Failed : </strong> {{Session::get('exception','')}}

		</div>
	@endif



  <form method="post" class="form-horizontal" role="form" action={!! url('storedriver') !!} ><input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <div class="row" style="margin-top: 5%;">
		  <div class="col-md-6">

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  First Name
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname')}}">
					  @if ($errors->has('fname')) <p class="alert-danger">{{ $errors->first('fname') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Last Name
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname')}}">
					  @if ($errors->has('lname')) <p class="alert-danger">{{ $errors->first('lname') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Licence No.
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="licence_no" name="licence_no" value="{{ old('licence_no')}}">
					  @if ($errors->has('licence_no')) <p class="alert-danger">{{ $errors->first('licence_no') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  NIC No.
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="NIC" name="NIC" value="{{ old('NIC')}}">
					  @if ($errors->has('NIC')) <p class="alert-danger">{{ $errors->first('NIC') }}</p>@else <br>@endif

				  </div>
			  </div>


			  </div>

			  <div class="col-md-6" style="margin-right:0">



				  <div class="form-group" style="margin-left: 10%">

					  <label for="Name" class="col-sm-4" style="font-size: larger;margin-top: 1%">
						  Address
					  </label>

					  <div class="col-sm-7">

						  <textarea type="text" class="form-control" rows="3" cols="2" id="address" name="address" value="{{ old('address')}}"> </textarea>
						  @if ($errors->has('address')) <p class="alert-danger">{{ $errors->first('address') }}</p>@else <br>@endif

					  </div>
				  </div>

				  <div class="form-group" style="margin-left: 10%">

					  <label for="Name" class="col-sm-4" style="font-size: larger;margin-top: 1%">
						  Phone No.
					  </label>

					  <div class="col-sm-7">

						  <input type="text" class="form-control" id="tel_no" name="tel_no" value="{{ old('tel_no')}}">
						  @if ($errors->has('tel_no')) <p class="alert-danger">{{ $errors->first('tel_no') }}</p>@else <br>@endif

					  </div>
				  </div>

				  <div class="form-group" style="margin-left: 10%">

					  <label for="Name" class="col-sm-4" style="font-size: larger;margin-top: 1%">
						  Status
					  </label>

					  <div class="col-sm-7">

						  <select class="form-control" id="status" name="status" value="{{ old('status')}}">

							  <option value="Select a status">Select the driver status </option>
							  <option>Available</option>
							  <option>Busy</option>

						  </select>

						  @if ($errors->has('status')) <p class="alert-danger">{{ $errors->first('status') }}</p>@else <br>@endif

					  </div>
				  </div>
			  </div>

		  <div class="row" style="margin-top: 25%;margin-left: 15%">
			  <div class="col-md-12">


				  <div class="col-sm-3">
				  </div>



				  <button type="submit" class="btn btn-primary  col-sm-1 " style="width: 8.5%">
					  Add
				  </button>

				  <div class="col-sm-1">
				  </div>

				  <div class="btn-group col-sm-1">
					  <a class="btn btn-warning  btn-block" href={!! url('supervisorwelcome') !!} style="width:150%">Cancel
					  </a>
				  </div>




			  </div>

		  </div>

		  </div>


			</form>
</div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>