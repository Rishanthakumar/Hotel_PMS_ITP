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

  @if($errors->any() || session('error_status')))
	  <div class="modal fade text-center" id="modelpopup" role="dialog">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-header"></h4>
				  </div>

				  <div class=" row modal-body">
					<div class="alert-warning">
						<ul>
						{{ $errors->first() }}
							@if(session('error_status'))
								{{ session('error_status') }}
							@endif
						</ul>
					</div>

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
				Update Reservation
			</h4>


		</div>
		<div class="col-md-2">
			<div align="left">
				<a class="btn btn-default"  href={!! url('/FO_mainpage') !!} style="width:45%">Home
				</a>
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 3%">



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

						<td>
							<form class="form-horizontal" role="form" id="{{ $reservdetail->res_id }}" method="POST" action={!! url('/updateres/viewservices_res') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="res_id" value="{{ $reservdetail->res_id }}">
								<input type="hidden" name="service_time" value="update">
								<button type="submit" class="btn btn-primary btn-sm" style="margin-left: 5%"  data-toggle="modal" data-target="#edittable{{ $reservdetail->res_id }}" >View Services</button>

							</form>

							{{--	<a class="btn btn-primary btn-sm" style="margin-left: 5%" data-toggle="modal" data-target="#edittable{{ $reservdetail->res_id }}"  href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>--}}
							<!--	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edittable{{ $reservdetail->res_id }}" style="width: 100%" >Edit</button><br /> <br /> -->
							<div class="modal fade text-center" id="edittable{{ $reservdetail->res_id }}" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-header">Reservation Id : {{ $reservdetail->res_id }}</h4>
										</div>
										<!--	<form method="POST" class="form-horizontal" role="form" action={!! url('reservations/edit')  !!}  ><input type="hidden" name="_token" value="{{ csrf_token() }}">
											 -->

										<div class=" row modal-body">
											<div class="col-md-12">

												<div class="col-sm-4"></div>



													<div class="col-sm-4"></div>
											</div>

											{!! Form::open(['method'=>'post','action' => 'ReservationController@update_res']) !!}
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="service_time" value="update">
											<input type ="hidden" name="res_id" id="res_id" value="{{ $reservdetail->res_id }}">

											<div class="row">
												<div class="col-md-12">
													<h4 class="text-info">Added Services</h4>
												</div>


												<div class="col-md-12" align="left" style="margin-left: 20%">



													@if(session()->has($reservdetail->res_id.'added_services'))

														@foreach( session($reservdetail->res_id.'added_services') as $service)
															<div class="checkbox">
																<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}sp{{ $service->room_id }}" style="font-size:large"><b>{{  $service->service_name }} - Room NO:{{ $service->room_id }}</b></label>

															</div>
														@endforeach


													@endif



												</div>

												<div class="col-md-12" align="center">
													<br>
													<button type="submit" class="btn btn-warning" name="btn" value="remove" @if(session($reservdetail->res_id.'added_services') == null) disabled @endif>
														Remove Services
													</button>
												</div>

												<div class="col-md-12">
													<hr>

													<hr>
												</div>

												<div class="col-md-12">
													<h4 class="text-info">Add New Services</h4>
												</div>
												<br>


												<div class="col-md-12">
													<div class="col-sm-4">
														</div>


														@if(session('room_id'))
															<div class="col-sm-4">
																<select class="form-control"  name="room_no" id="no_of_rooms">
																	{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
																	@foreach(session('room_id') as $room_no)

																		<option value="{{ $room_no->room_id}}" >{{ $room_no->room_id}}</option>
																	@endforeach
																</select>
															</div>
														@endif



													<div class="col-sm-4">
														</div>
												</div>


												<div class="col-md-12" align="left" style="margin-left: 20%">




													@if(session()->has($reservdetail->res_id.'not_added_services'))

														@foreach( session($reservdetail->res_id.'not_added_services') as $new_service)
															<div class="checkbox">
																<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
															</div>
														@endforeach


													@endif



												</div>

												<div class="col-md-12" align="center">
													<br>
													<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session($reservdetail->res_id.'not_added_services') == null || !session('room_id')) disabled @endif>
														Add Services
													</button>
												</div>


											</div>

											@if(session('service_res_id')==$reservdetail->res_id)


												{!!
                                                "<script>
                                                    $(document).ready(function() {


                                                        $('#edittable".$reservdetail->res_id."').modal('show');
                                                    });
                                                </script>"

                                                !!}

												{{ Session::forget($reservdetail->res_id.'not_added_services') }}

												{{ Session::forget($reservdetail->res_id.'added_services')}}

												{{ Session::forget('service_res_id') }}


											@endif




											{!! Form::close() !!}
										</div>
										<div class="modal-footer">


										</div>



									</div>
								</div>
							</div>

						</td>

					<td>
						<br>
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cancel_reservation" style="width: 100%" @if(($reservdetail->status == 'checked_in') || ($reservdetail->status == 'temp_checked_out') )disabled @endif >Cancel</button><br /> <br />
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
											{!! Form::open(['method'=>'post','action' => 'ReservationController@cancel_reservation']) !!}
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type ="hidden" name="res_id" id="res_id" value="{{ $reservdetail->res_id }}">

											<div>
											<button type="submit" class="btn-group btn btn-primary">
												Ok
											</button>
											{!! Form::close() !!}


											<button type="button" class="btn btn-default" data-dismiss="modal">
												Cancel
											</button>
												</div>

										</div>




								</div>
							</div>
						</div>
					</td>

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

			<form>
				<input type="hidden" id="service_res_id" value="{{ session('service_res_id') }}">
			</form>


		</div>
	</div>
  </div>





	<!--Functions of date and timepicker-->
	<script>
		$(function() {
			$( "#arrival" ).datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true
			});



			$( "#datepicker1" ).datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true
			});

		});


	</script>


	<script>
		/*$(document).ready( function() {
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



		} );*/

		$(document).ready(function() {
			$('#table_id').dataTable( {
				"bStateSave": true
			} );
		} );

		/*$.fn.dataTableExt.oApi.fnFixPaginationParams = function(oSettings, aoData) {
			if (oSettings.newPage == undefined) {  // is this the first time a page load has been requested
				var oData;
				var sData = this.oApi._fnReadCookie("SpryMedia_DataTables_" + oSettings.sInstance);
				if (sData !== null && sData !== '') {
					// Try/catch the JSON eval - if it is bad then we ignore it
					try {
						// Use the JSON library for safety - if it is available
						if (typeof JSON == 'object' && typeof JSON.parse == 'function') {
							// DT 1.4.0 used single quotes for a string - JSON.parse doesn't allow this and throws
							// an error. So for now we can do this. This can be removed in future it is just to
							// allow the transfer to 1.4.1+ to occur
							oData = JSON.parse(sData.replace(/'/g, '"'));
						}
						else {
							oData = eval('(' + sData + ')');
						}
						for (var i = 0; i < aoData.length; i++) {
							if (aoData[i].name == "iDisplayStart") {
								aoData[i].value = oData.iStart;
								break;
							}
						}
					}
					catch (e) {
						// do nothing
					}
					oSettings.newPage = true;
				}
			}
		}

		var tblManualCRRReferrals;
		$(document).ready( function() {
			tblManualCRReferrals = $("#table_id").dataTable( {
			"fnServerData": getServerData
		});
		});

		function getServerData(sSource, aoData, fnCallback ) {
			if (tblManualCRRReferrals == undefined) {
				return;
			}
			tblManualCRRReferrals.fnFixPaginationParams(aoData);
			// tell DataTables to get on with it
			$.getJSON( sSource, aoData, function (json) {
				fnCallback(json)
			});
		}

		// load the data into the table
		jQuery(document).ready(function() {
			tblManualCRRReferrals.fnDraw();
		});
*/
	</script>
 {{-- <script>
	  $(document).ready( function () {
		  $('#table_id').DataTable();
	  } );
  </script>--}}









  </body>
</html>