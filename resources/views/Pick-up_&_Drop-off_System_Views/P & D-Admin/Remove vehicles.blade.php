<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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


	  <!--links for the search data tables -->

	  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">
	  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

  </head>
  <!--<body style="background-image: url('http://localhost:8888/backlogo.jpg');background-size: 100%";>

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

			  <li class="active">

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
					  <li class="active">
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
--}}
				  </ul>
			  </li>


		  </ul>
	  </div>
  </div>

  </ul>
  </li>
  </ul>
	  <div class="row">
		  <div class="col-md-11">
			  <h4 class="text-muted" style="margin-top: 2%;margin-left: 1%">
				 Remove Vehicles
			  </h4>
		  </div>

		  <div class="col-md-1">
			  <br>
			  <a class="btn btn-default pull-right " style="margin-left: 82%" href={!! url('supervisorwelcome') !!} style="width:50%">Home
			  </a>

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
	  @endif

	<div class="row">


		<div class="col-md-12">

			<div class="row" style="margin-top: 3%">

			<table id="RemoveVehicleTable" class="table table-bordered table-condensed table-hover" style="margin-top: 3%">
				<thead>
					<tr class="success">
						<th>
							Vehicle No.
						</th>
						<th>
							Vehicle Type
						</th>
						<th>
							Brand
						</th>
						<th>
							Model
						</th>
						<th>
							Colour
						</th>
						<th>
							Reg. Date
						</th>
						<th>
							Cylinder Capacity
						</th>
						<th>
							Manu. Year
						</th>
						<th>
							Rate per KM
						</th>
						<th>
							Status
						</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($vehicles as $vehicle)
					<tr class="active">
						<td>
							{{$vehicle -> vehicle_no}}

						</td>
						<td>
							{{$vehicle -> vehicle_type}}
						</td>
						<td>
							{{$vehicle -> brand}}
						</td>
						<td>
							{{$vehicle -> model}}
						</td>
						<td>
							{{$vehicle -> colour}}
						</td>
						<td>
							{{$vehicle -> registration_date}}
						</td>
						<td>
							{{$vehicle -> cylinder_capacity}}
						</td>
						<td>
							{{$vehicle -> manufactured_year}}
						</td>
						<td>
							{{$vehicle -> rate_per_km}}
						</td>
						<td>
							{{$vehicle -> status}}
						</td>
						<td class="col-sm-1">
							<a class="btn btn-warning btn-sm" style="margin-left: 30%" data-toggle="modal" data-target="#{{$vehicle -> vehicle_no}}" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>

							<div id="{{$vehicle -> vehicle_no}}" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 style="text-align: center">Remove Vehicle : {{ $vehicle->vehicle_no }}</h4>
										</div>
										<div class="modal-body">
											<form method="post" class="form-horizontal" role="form" style="margin-top: 5%" action={!! url('removevehicle') !!}>
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="vehicle_no" value="{{ $vehicle -> vehicle_no}}">
												<div class="form-group">

													<div class="col-md-12">

														<div class="form-group">

															<div id="deleteWarning" class="alert alert-danger">
																<strong style="margin-left: 25%">Warning : </strong>You are about to delete a vehicle!
															</div>

														</div>
														<div class="form-group">
															<div class="col-sm-offset-5 col-sm-10">

																<button type="submit" class="btn btn-primary">
																	Delete
																</button>


															</div>
														</div>
													</div>
												</div>
											</form>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
</div>
</div>
  </body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>



  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
	  $(document).ready(function(){
		  $('#RemoveVehicleTable').DataTable();
	  });
  </script>


</html>