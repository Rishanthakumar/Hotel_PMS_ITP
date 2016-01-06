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


	<!-- These links the date picker-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

	<!-- jQuery -->

	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
</head>
  <body>

    <div class="container">
	<div class="row" >
		<div class="col-md-3">
		</div>
		<div class="col-md-12">
			<h3 class="text-center text-muted">
				Front Office Management System
			</h3>
			<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
			<hr>
			<h4 class="text-center text-muted">
				Waitlisted Reservations
			</h4>


		</div>
		<div class="col-md-3">
			<div class="btn-group">
				<a class="btn btn-default  btn-block" href={!! url('FO_mainpage') !!} style="width:100%">Home
				</a>
			</div>
		</div>
	</div>


		<div class="row" style="margin-top: 3%">
			@if (session('succ_status')||session('exception'))
				<div class="modal fade text-center" id="modelpopup" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">


								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-header"></h4>
							</div>

							<div class=" row modal-body">
								@if(session('succ_status'))
									<div class="alert alert-success">
										<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>{{ session('succ_status') }}
									</div>
									{{ Session::forget('succ_status')}}
								@elseif(session('exception'))
									<div class="alert alert-danger">
										{{ session('exception') }}
									</div>
									{{ Session::forget('exception')}}
								@endif

							</div>


						</div>



					</div>
				</div>

				<script>
					$(document).ready(function(){
						$('#modelpopup').modal('show');
					});
				</script>


			@endif
			<div class="col-md-12">
				<table id="table_id" class="display table-bordered">
					<thead>
					<tr class="alert-success">
						<th>
							Reservation ID
						</th>
						<th>
							Date
						</th>
						<th>
							Name
						</th>
						<th>
							Check-In
						</th>
						<th>
							Check-Out
						</th>
						<th>
							Type
						</th>
						<th>
							Adults
						</th>
						<th>
							Children
						</th>
						<th>
							No. of Rooms
						</th>

						<th>
							Status
						</th>
						{{--<th>
							Cus_Id
						</th>--}}

						<th>
							Action
						</th>
						<th>
							Action
						</th>
					</tr>
					</thead>
					<tbody>

					@foreach($reser as $reservdetail)
						<tr>

							<!-- To get the Status -->
							<?php $status = $reservdetail->status;

							if($status == 'cancelled')
							{
								$textstatus = 'disabled';
								$reinsstatus = '';

							}
							else
							{
								$textstatus= '';
								$reinsstatus = 'disabled';

							}

							?>
							<td>
								{{ $reservdetail->res_id }}
							</td>
							<td>
								{{ $reservdetail->date }}
							</td>
							<td>
								{{ $reservdetail->name }}
							</td>
							<td>
								{{ strtok($reservdetail->check_in," ") }}
							</td>
							<td>
								{{ strtok($reservdetail->check_out," ") }}
							</td>
							<td>
								{{ $reservdetail->type }}
							</td>
							<td>
								{{ $reservdetail->adults }}
							</td>
							<td>
								{{ $reservdetail->children }}
							</td>
							<td>
								{{ $reservdetail->no_of_rooms }}
							</td>

							<td>
								{{ $reservdetail->status }}
							</td>
							{{--<td>
								{{ $reservdetail->cus_id }}
							</td>--}}
							<form method="post" action="{{ url('/waitlist_acc_cancel') }}">
							<td>

									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $reservdetail->res_id }}">

									<button type="submit" class="btn btn-primary" value="accept" name="btn" style="width: 100%" >Accept</button>


							</td>

								<td>
{{--
									<button type="submit" class="btn btn-warning" value="cancel" name="btn" style="width: 100%" >Cancel</button>
--}}								<br>
									<button type="button"  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cancel_reservation" style="width: 100%" @if(($reservdetail->status == 'checked_in') || ($reservdetail->status == 'temp_checked_out') )disabled @endif >Cancel</button><br /> <br />
									<div class="modal fade text-center" id="cancel_reservation" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">

												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-header"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> Cancellation   </h4>
												</div>


												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class=" row modal-body">
													<div class="alert alert-warning">
														<label for="reason"  style="font-size: medium">
															Do you want to Cancel the reservation?
														</label>
													</div>

												</div>
												<div class="modal-footer">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type ="hidden" name="res_id" id="res_id" value="{{ $reservdetail->res_id }}">

													<div>
														<button type="submit" value="cancel" name="btn" class="btn-group btn btn-primary">
															Ok
														</button>


														<button type="button" class="btn btn-default" data-dismiss="modal">
															Cancel
														</button>
													</div>

												</div>




											</div>
										</div>
									</div>
								</td>
							</form>

						</tr>

						<script>
							$(function() {

								var id = "{{ $reservdetail->res_id }}"
								var id1 = "#datepicker2".concat(id);
								var id2 = "#datepicker3".concat(id);

								$( id1 ).datepicker({
									dateFormat: 'yy-mm-dd',
									changeMonth: true,
									changeYear: true
								});


								$( id2 ).datepicker({
									dateFormat: 'yy-mm-dd',
									changeMonth: true,
									changeYear: true
								});

							});

						</script>


					@endforeach

					</tbody>
				</table>

			</div>
		</div>






</div>
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
				changeMonth: true,
				changeYear: true
			});

			$( "#datepicker1" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		});

	</script>

		<script>
			$(document).ready( function() {
				$('#table_id').DataTable( {

					"bLengthChange": false,
					"fnPreDrawCallback": function( oSettings ) {
						oTable = $("#table_id").dataTable();
						oSettings._iDisplayLength = 4;

					}
				} );

				var table = $('#table_id').DataTable();
				$('#arrival').keyup(function(){
					table.search($(this).val(),
							$('#global_regex').prop('checked')

					).draw() ;
				});



			} );
		</script>


  </body>
</html>