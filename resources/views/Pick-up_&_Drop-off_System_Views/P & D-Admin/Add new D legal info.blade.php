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

		  <div class="row">
			  <div class="col-md-12">

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
							  <li>
								  <a href={!! url('addvehiclelegal') !!}>Add new vehicle legal info</a>
							  </li>
							  <li class="divider">
							  </li>
							  <li class="active">
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







			  {{--<li class="dropdown pull-right">
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
						  Add Driver Legal Information
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
					  <strong>Failed : </strong> {{Session::get('exception','')}}

				  </div>
			  @endif




			  <form method="post"  class="form-horizontal" role="form" style="margin-top: 3%" action={!! url('storedriverlegal') !!}>
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
					  <div class="col-md-12">
						  <form role="form">
							  <div class="col-md-6">

							  <div class="form-group">
								  <br>

								  <label for="Name" class="col-sm-3" style="font-size: larger;margin-left: 8.5%">
									  Driver.ID
								  </label>

								   <div class="btn-group col-sm-5">
									  <select class="form-control"  name="driver_id" id="driver_id">
										  {{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
										  <option value="Select a driver">Select a driver </option>
										  @foreach ($drivers as $driver)
											  <option value="{{$driver -> driver_id}}">{{$driver -> driver_id}}</option>
										  @endforeach

									  </select>
									  @if ($errors->has('driver_id')) <p class="alert-danger">{{ $errors->first('driver_id') }}</p>@else <br>@endif

								  </div>

							  </div>

							  <div class="form-group" style="margin-top: 7%">

								  <label for="Name" class="col-sm-3" style="font-size: larger;margin-left: 8.5%">
									  Driver Name
								  </label>

								  <div class="col-sm-5">

									  <input type="text" class="form-control" id="driver_name" name="driver_name" value="{{ old('driver_name')}}">
									  @if ($errors->has('driver_name')) <p class="alert-danger">{{ $errors->first('driver_name') }}</p>@else @endif

								  </div>
							  </div>

							  </div>

							  <div class="col-md-6">

							        <div class="form-group">

								  <label   class="col-sm-2 control-label" style="margin-top:2%;font-size: larger">
									  Comment
								  </label>
								  <div class="col-sm-5" style="width: 47%">
									<textarea class="form-control custom-control" id="comment" name="comment" rows="3" style="	resize:none" value="{{ old('comment')}}">
								</textarea>
									  @if ($errors->has('comment')) <p class="alert-danger">{{ $errors->first('comment') }}</p>@else @endif

								  </div>
							  </div>

							  <div class="form-group">

								  <label style="margin-top:2%;font-size: larger">
									  Attach a file
								  </label>
							  </div>


							  <div class="col-sm-6">
								 <input name ="attachement" id="attachement" class="form-control"  type="file" {{--accept="application/pdf"/--}}  style="margin-top: -18%;margin-left: 33%;height: 10%;color: red">

								  @if ($errors->has('attachement')) <p class="alert-danger">{{ $errors->first('attachement') }}</p> @endif


							  </div>

							  </div>

							  <div class="form-group">
								  <div class="col-sm-offset-2 col-sm-10">
									  <br> <br> <br>
									  <button type="submit" class="btn btn-primary col-sm-1" style="margin-left: 30%">
										  Submit
									  </button>
								  </div>

							  </div>





						  </form>
						  </div>
					  </div>
			  </form>

		  </div>
		  </div>
	  </div>
	</div>


		  {{--<div class="form-group">

              <label style="margin-top:2%; font-size: larger"  class="col-sm-2 control-label">
                  Attach a file
              </label>
              </div>


          <div class="col-sm-3">
              <input  name="attachement" class="form-control"  type="file" accept="application/pdf" style="margin-top: -18%;margin-left: 70%;height: 10%" value="{{ old('attachement')}}"/>
              @if ($errors->has('attachement')) <p class="alert-danger">{{ $errors->first('attachement') }}</p>@else <br>@endif
          </div>--}}

<script>

	$('#driver_id').on('change',function(e){
		console.log(e);

		var po=e.target.value;
		console.log(po);
		$.get('/storedriverlegal?driver_id='+po,function(data){

			//get name by driver_id
			 $.each(data,function(index, zoneObj){

				document.getElementById("driver_name").value=zoneObj.fname;
			});


		});
	});


</script>






    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>