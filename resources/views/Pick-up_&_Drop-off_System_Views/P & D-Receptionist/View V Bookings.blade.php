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

	  <!--links for the search data tables -->

	  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">
	  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

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
		  {{--<li>
			  <a href={!! url('finalizebooking') !!}>Finalize vehicle bookings</a>
		  </li>--}}
		  <li>
			  <a href={!! url('updatebooking') !!}>Update vehicle bookings</a>
		  </li>

		  <li >
			  <a href={!! url('pendingpaymenthandling') !!}>Payment handling</a>
		  </li>

		  <li class="active">
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

	  <div class="row">


		  <div class="col-md-1">
			  <br>
			  <a class="btn btn-default pull-right " style="margin-left: 82%" href={!! url('welcomereceptionist') !!} style="width:50%">Home
			  </a>

		  </div>

		  <div class="col-md-11">

		  </div>
	  </div>

	  <br>

	  @if (Session::has ('message'))
		  <div class="alert alert-success">

			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Success : </strong> {{Session::get('message','')}}

		  </div>

	  @elseif (Session::has ('message1'))
		  <div class="alert alert-success">

			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Success : </strong> {{Session::get('message1','')}}

		  </div>

	  @elseif (Session::has ('exceptionerr'))
		  <div class="alert alert-danger">

			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Failed : </strong> {{Session::get('exceptionerr','')}}

		  </div>
	  @endif


		<div class="row" style="margin-top: 3%">

		<div class="col-md-12">
			<table id="UpdateBookingTable" class="table table-bordered table-condensed table-hover" style="margin-top: 3%">
				<thead>
					<tr class="success">
						<th >
							VR-ID
						</th>
						<th>
							Guest Name
						</th>
						<th>
							Res-ID
						</th>
						<th>
							Mem-ID
						</th>
						<th>
							Tel No.
						</th>
						{{--<th>
							Date
						</th>--}}
						<th>
							Service Date
						</th>
						<th>
							Service Time
						</th>
						<th>
							Package
						</th>
						<th>
							Package Price
						</th>
						<th>
							Vehicle No.
						</th>

						<th>
							Driver
						</th>
						<th>
							Status
						</th>

					</tr>
				</thead>
				<tbody>
				@foreach($vehicle_reservations as $vehicle_reservation)
					<tr class="active">
						<td>
							{{$vehicle_reservation -> vr_id}}
						</td>
						<td>
							{{$vehicle_reservation -> guest_name}}
						</td>
						<td>
							{{$vehicle_reservation -> res_id}}
						</td>
						<td>
							{{$vehicle_reservation -> mem_id}}
						</td>
						<td>
							{{$vehicle_reservation -> tel_no}}
						</td>

						{{--<td>
							{{$vehicle_reservation -> date}}
						</td>--}}
						<td>
							{{$vehicle_reservation -> service_date}}
						</td>
						<td>
							{{$vehicle_reservation -> service_time}}
						</td>

						<td>
							{{$vehicle_reservation -> package}}
						</td>

						<td>
							{{$vehicle_reservation -> package_price}}
						</td>

						<td>
							{{$vehicle_reservation -> vehicle_no}}
						</td>

						<td>
							{{$vehicle_reservation -> driver_name}}
						</td>
						<td>
							{{$vehicle_reservation -> status}}
						</td>

							{{--<a class="btn btn-primary btn-xs" style="margin-left: 20%" data-toggle="modal" data-target="#e{{$vehicle_reservation -> vr_id}}" href="#">--}}{{----}}{{--<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>--}}{{--
							<a class="btn btn-warning btn-xs" style="margin-left: 2%;margin-top: 40%" data-toggle="modal" data-target="#d{{$vehicle_reservation -> vr_id}}" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
							<div class="col-sm-1" style="margin-left: 4%">
							<div class="col-sm-1"></div>
							<div class="col-sm-1"></div>
							<div class="col-sm-1"></div>
							<div class="col-sm-1"></div>


									<form method="post" action="{{ url('/finalreservation') }}">

										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="res_id" value="{{ $vehicle_reservation-> res_id }}">
										<input type="hidden" name="mem_id" value="{{ $vehicle_reservation-> mem_id }}">
										<input type="hidden" name="v_res_id" value="{{ $vehicle_reservation-> vr_id }}">
										<input type="hidden" name="vehicle_no" value="{{ $vehicle_reservation -> vehicle_no }}">
										<input type="hidden" name="package" value="{{ $vehicle_reservation-> package }}">
										<input type="hidden" name="package_price" value="{{ $vehicle_reservation -> package_price }}">
										<button class="btn btn-success btn-xs" type="submit" style="">Finalize</button>

									</form>

							</div>
							<!-- Trigger the modal with a button -->


							<!-- Modal -->
--}}{{--							<div id="e{{$vehicle_reservation -> vr_id}}" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4  style="text-align: center">Vehicle Reservation ID : {{ $vehicle_reservation->vr_id }}</h4>
										</div>
										<div class="modal-body">
											<form method="post" class="form-horizontal" role="form" style="margin-top: 5%" action="editvehiclebookings">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class="form-group">

													<label class="col-sm-5 control-label">
														Vehicle Reservation ID
													</label>
													<div class="col-sm-6">
														<input class="form-control" id="vr_id" name="vr_id" readonly value="{{$vehicle_reservation->vr_id}}" type="text">
													</div>
												</div>



												<div class="form-group">

													<label  class="col-sm-5 control-label">
														Guest Name
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="guest_name" name="guest_name" value="{{$vehicle_reservation->guest_name}}" type="text">
													</div>
												</div>
												<div class="form-group">

													<label class="col-sm-5 control-label">
														Reservation ID
													</label>
													<div class="col-sm-6">
														<input class="form-control" id="res_id" name="res_id" readonly value="{{$vehicle_reservation->res_id}}" type="text">
													</div>
												</div>

												<div class="form-group">

													<label class="col-sm-5 control-label">
														Member ID
													</label>
													<div class="col-sm-6">
														<input class="form-control" id="mem_id" name="mem_id" readonly value="{{$vehicle_reservation->mem_id}}" type="text">
													</div>
												</div>

												<div class="form-group">

													<label  class="col-sm-5 control-label">
														Mobile No.
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="tel_no" name="tel_no" value="{{$vehicle_reservation->tel_no}}" type="text">
													</div>
												</div>

												<div class="form-group">

													<label  class="col-sm-5 control-label">
														Date
													</label>
													<div class="col-sm-6">
														<input class="form-control"  id="date" name="date" readonly value="{{$vehicle_reservation->date}}" type="text">
													</div>
												</div>

												<div class="form-group">

													<label   class="col-sm-5 control-label">
														Service Date
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="service_date" name="service_date" value="{{$vehicle_reservation->service_date}}" type="text">

													</div>
												</div>

												<div class="form-group">

													<label   class="col-sm-5 control-label">
														Service Time
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="service_time" name="service_time" value="{{$vehicle_reservation->service_time}}" type="text">

													</div>
												</div>

												<div class="form-group">

													<label   class="col-sm-5 control-label">
														Package
													</label>
													<div class="btn-group col-sm-6">
														<select class="form-control"  name="package" id="package">
															--}}{{----}}{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}{{----}}{{--


															@foreach ($vehicle_packages as $vehicle_packages)
																<option value="{{$vehicle_packages -> package_name}}">{{$vehicle_packages -> package_name}}</option>
															@endforeach



														</select>
														@if ($errors->has('package')) <p class="alert-danger">{{ $errors->first('package') }}</p>@else @endif

													</div>
												</div>

												<div class="form-group">

													<label   class="col-sm-5 control-label">
														Package Price
													</label>
													<div class="col-sm-6">
														<input class="form-control" id="package_price" name="package_price" value="{{$vehicle_reservation->package_price}}" type="text">

														@if ($errors->has('package_price')) <p class="alert-danger">{{ $errors->first('package_price') }}</p>@else @endif</div>
												</div>

												<div class="form-group">

													<label  class="col-sm-5 control-label">
														Vehicle
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="vehicle_no" name="vehicle_no" value="{{$vehicle_reservation->vehicle_no}}" type="text">
													</div>
												</div>


												<div class="form-group">

													<label  class="col-sm-5 control-label">
														Driver
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="driver_name" name="driver_name" value="{{$vehicle_reservation->driver_name}}" type="text">
													</div>
												</div>

												<div class="form-group">

													<label   class="col-sm-5 control-label">
														Status
													</label>
													<div class="col-sm-6">
														<input class="form-control" readonly id="status" name="status" value="{{$vehicle_reservation->status}}" type="text">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-offset-5 col-sm-10">

														<button type="submit" class="btn btn-primary">
															Edit
														</button>

													</div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>


											</form>
										</div>
									</div>
								</div>
								</div>--}}{{--


											<div id="d{{$vehicle_reservation -> vr_id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">

													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-header" style="text-align: center">Remove Vehicle Reservation : {{ $vehicle_reservation->vr_id }}</h4>
														</div>
														<div class="modal-body">
															<form method="post" class="form-horizontal" role="form" style="margin-top: 5%" action={!! url('removevehiclebooking') !!}>
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
																<input type="hidden" name="vr_id" value="{{ $vehicle_reservation -> vr_id}}">
																<div class="form-group">

																	<div class="col-md-12">

																		<div class="form-group">

																			<div id="deleteWarning" class="alert alert-danger">
																				<strong style="margin-left: 20%">Warning : </strong>You are about to delete a vehicle reservation!
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




		</td>--}}

	</tr>

				@endforeach
 </tbody>
</table>
</div><script>

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
</div>
</div>



</div>

  {{Session::forget('date')}}
  {{Session::forget('time')}}


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>



  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
	  $(document).ready(function(){
		  $('#UpdateBookingTable').DataTable();
	  });

  </script>


  </body>
</html>