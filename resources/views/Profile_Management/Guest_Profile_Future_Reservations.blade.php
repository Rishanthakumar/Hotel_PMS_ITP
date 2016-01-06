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


	  <!-- DataTables CSS -->
	  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

	  <!-- jQuery -->

	  <!-- DataTables -->
	  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

	  <script type="text/javascript">
		  $(document).ready(function() {
			  $('#future_res').DataTable();
		  } );

	  </script>



  </head>
  <body>

    <div class="container">
		<div class="row" >


				<div class="row">

					<div class="col-md-12">
							<div>
							<h3 class="text-muted text-center">
								Customer Profile Management System
							</h3>

								<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">


							<br>
							<hr>
							<h4 class="text-muted text-center">
								Reservation Details
							</h4>
							</div>

					</div>

				</div>


			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">

						<li>
							<a href="{{ url('/guest_profile/pastreservations') }}">Past Reservations</a>
						</li>
						<li class="active">
							<a href="#">Future Reseravations</a>
						</li>

					</ul>

				</div>

			</div>


			<div class="col-sm-2" style="margin-top: 3%">
				<div class="btn-group btn-block"> <a class="btn btn-default btn-block "  style="width:40%;margin-left: 650%" href={!! url('/guest_profile') !!} >Home</a></div>
			</div>

			<br>
			<br>

			<div class="row" style="margin-top: 5%">
				<div class="col-md-12">
					<table id="future_res" class="table table-bordered table-condensed">
						<thead>
						<tr class="success">
							<th>
								Customer ID
							</th>
							<th>
								Customer Name
							</th>
							<th>
								Action
							</th>

						</tr>
						</thead>
						<tbody>

						@foreach($reservation as $reserva)
							<tr>
								<td>{{$reserva->cus_id}}</td>
								<td>{{$reserva->name}}</td>

								<td>
									<button type="submit" style="margin-left: 35%" class="btn btn-primary" data-toggle="modal" data-target="#{{$reserva -> cus_id}}">View Details</button>
									<div class="modal fade" id="{{$reserva -> cus_id}}" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title text-center">Future Reservation Details - Customer : {{$reserva -> cus_id}}</h4>
												</div>
												<form class="form-horizontal" role="form" method="post" action="{{url('guest_profile/futurereservations')}}">
													<div class="modal-body">
														<div class="row" style="margin-top: 5%">

															<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

															<input type="hidden" name="cus_id" value= "{{$reserva -> cus_id}}">

															<div class="col-md-12">


																<div class="form-group " style="margin-left: 6%" >

																	<div class="row">
																		<div class="col-md-11">
																			<table class="table table-bordered table-condensed">
																				<thead>
																				<tr class="success">
																					<th>
																						Res ID
																					</th>
																					<th>
																						Check Out Date & Time
																					</th>
																					<th>
																						Check In Date & Time
																					</th>
																					<th>
																						Adults
																					</th>
																					<th>
																						Children
																					</th>
																					<th>
																						NO of Rooms
																					</th>
																				</tr>
																				</thead>
																				<tbody>
																				<tr>
																					<td>{{$reserva->res_id}}</td>
																					<td>{{$reserva->check_out}}</td>
																					<td>{{$reserva->check_in}}</td>
																					<td>{{$reserva->adults}}</td>
																					<td>{{$reserva->children}}</td>
																					<td>{{$reserva->no_of_rooms}}</td>
																				</tr>




																				</tbody>
																			</table>
																		</div>
																	</div>

																</div>

																<br>


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

								</td>
							</tr>

						@endforeach
						</tbody>
					</table>


				</div>
			</div>


		</div>
	</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>