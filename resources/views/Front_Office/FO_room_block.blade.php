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
				Room Block
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



	</div>

	<div class="row"  style="margin-top: 3%">

		<div class="col-md-12">
		<div class="col-sm-2">

			<table width="100%" class="text-info">
				<thead>
					<h5>Reservation ID : {{ $res_id }}</h5>
				</thead>

				<tr>

					<th>

						<div >
						<small>Room Type</small>
							</div>
					</th>

					<th>

					</th>

					<th>
						<div style="margin-left: 3%">
						<small>No. of Rooms</small>
							</div>
					</th>

				</tr>

				@foreach($reser as $res)
					<tr>
						<td>
							{{ $res->type_name }}
						</td>
						<td>

						</td>
						<td style="margin-left: 3%">
							{{ $res->count }}
						</td>
					</tr>
				@endforeach

			</table>



		</div>
			{!! Form::open(['method'=>'post','action' => 'ReservationController@block_rooms_block']) !!}

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="res_id" value="{{ $res_id }}">
			@foreach($reser as $res)

				<input type="hidden" name="{{ $res->type_name }}" value="{{ $res->count }}">

			@endforeach

		<div class="col-sm-8" style="margin-top: -4%">



					<table class="table-bordered">

				<tbody>


					<tr>


						<td  @if(session('RS001occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RS001clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100" >
							<div align="center"><big> RS001 </big></div>

							<div align="center"><small> {{  session('RS001occupancy') }}</small></div>

							<div align="center"><input type="checkbox" id="myTextEditBox1" name="myTextEditBox[]" value="RS001" @if(session('RS001occupancy') == 'occupied') disabled @endif  @if(session('RS001')) checked data-toggle="toggle" @endif /></div>


							<div align="center">



								<form>



									</form>

								<form class="form-horizontal" role="form" id="RS001" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">


										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RS001">
									<button type="submit" id="RS001b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRS001"  @if(!session('RS001')) disabled @endif>Add Services</button>


									{!!

									"<script>
										$('#myTextEditBox1').click(function () {
										//check if checkbox is checked
										if ($(this).is(':checked')) {



										$('#RS001b').removeAttr('disabled'); //enable input

										} else {
										$('#RS001b').attr('disabled', true); //disable input


										}
										});


									</script>"

									!!}
								</form>

								<div class="modal fade text-center" id="edittableRS001" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RS001">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS001added_services'))

															@foreach( session('RS001added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RS001added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS001not_added_services'))

															@foreach( session('RS001not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RS001not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RS001")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRS001').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RS001not_added_services') }}

													{{ Session::forget('RS001added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>
						</td>



						<td  @if(session('RS002occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RS002clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100" >
							<div align="center"><big> RS002 </big></div>

							<div align="center"><small> {{  session('RS002occupancy') }} </small></div>
							<div align="center"><input type="checkbox" id="myTextEditBox2" value="RS002" name="myTextEditBox[]" @if(session('RS002occupancy') == 'occupied') disabled @endif  @if(session('RS002')) checked data-toggle="toggle" @endif /></div>



							<div align="center"><form class="form-horizontal" role="form" id="RS002" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RS002">
									<button type="submit" id="RS002b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRS002"  @if(!session('RS002')) disabled @endif>Add Services</button>


									{!!

									"<script>
										$('#myTextEditBox2').click(function () {
										//check if checkbox is checked
										if ($(this).is(':checked')) {



										$('#RS002b').removeAttr('disabled'); //enable input

										} else {
										$('#RS002b').attr('disabled', true); //disable input


										}
										});


									</script>"

									!!}
								</form>

								<div class="modal fade text-center" id="edittableRS002" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RS002">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS002added_services'))

															@foreach( session('RS002added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RS002added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS002not_added_services'))

															@foreach( session('RS002not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RS002not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RS002")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRS002').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RS002not_added_services') }}

													{{ Session::forget('RS002added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>
						</td>





						<td  @if(session('RS003occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RS003clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red"  @endif width="100" height="100" >
							<div align="center"><big> RS003 </big></div>

							<div align="center"><small> {{  session('RS003occupancy') }} </small></div>
							<div align="center"><input type="checkbox" id="myTextEditBox3" value="RS003" name="myTextEditBox[]" @if(session('RS003occupancy') == 'occupied') disabled @endif  @if(session('RS003')) checked data-toggle="toggle" @endif /></div>



			{{--			3rd model--}}


						<div align="center"><form class="form-horizontal" role="form" id="RS003" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="res_id" value="{{ $res_id  }}">
								<input type="hidden" name="service_time" value="room_block">
								<input type="hidden" name="room_no" value="RS003">
								<button type="submit" id="RS003b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRS003"  @if(!session('RS003')) disabled @endif>Add Services</button>


								{!!

                                "<script>
                                    $('#myTextEditBox3').click(function () {
                                    //check if checkbox is checked
                                    if ($(this).is(':checked')) {



                                    $('#RS003b').removeAttr('disabled'); //enable input

                                    } else {
                                    $('#RS003b').attr('disabled', true); //disable input


                                    }
                                    });


                                </script>"

                                !!}
							</form>

							<div class="modal fade text-center" id="edittableRS003" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
										</div>


										<div class=" row modal-body">
											{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="service_time" value="check_in">
											<input type="hidden" name="room_no" value="RS003">
											<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

											<div row>
												<div class="col-md-4"></div>
												<div class="col-md-4" style="margin-top: 3%" align="center">

													{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
												</div>
												<div class="col-md-4"></div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<h4 class="text-info">Added Services</h4>
												</div>


												<div class="col-md-12" align="left" style="margin-left: 20%">



													@if(session()->has('RS003added_services'))

														@foreach( session('RS003added_services') as $service)
															<div class="checkbox">
																<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
															</div>
														@endforeach


													@endif



												</div>

												<div class="col-md-12" align="center">
													<br>
													<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RS003added_services') == null) disabled @endif>
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

												<div class="col-md-12" align="left" style="margin-left: 20%">



													@if(session()->has('RS003not_added_services'))

														@foreach( session('RS003not_added_services') as $new_service)
															<div class="checkbox">
																<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
															</div>
														@endforeach


													@endif



												</div>

												<div class="col-md-12" align="center">
													<br>
													<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RS003not_added_services') == null) disabled @endif>
														Add Services
													</button>
												</div>


											</div>

											@if(session('room_no')== "RS003")


												{!!
                                                "<script>
                                                    $(document).ready(function() {


                                                        $('#edittableRS003').modal('show');
                                                    });
                                                </script>"

                                                !!}

												{{ Session::forget('RS003not_added_services') }}

												{{ Session::forget('RS003added_services')}}

												{{ Session::forget('room_no') }}


											@endif




											{!! Form::close() !!}
										</div>
										<div class="modal-footer">


										</div>



									</div>
								</div>
							</div></div>
						</td>

						<td width="100" height="100">

						</td>



						<td  @if(session('RL001occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RL001clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100" >
							<div align="center"><big> RL001 </big></div>

							<div align="center"><small> {{  session('RL001occupancy') }} </small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox4" value="RL001" name="myTextEditBox[]" @if(session('RL001occupancy') == 'occupied') disabled @endif  @if(session('RL001')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RL001" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RL001">
									<button type="submit" id="RL001b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRL001"  @if(!session('RL001')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox4').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RL001b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RL001b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRL001" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RL001">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL001added_services'))

															@foreach( session('RL001added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RL001added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL001not_added_services'))

															@foreach( session('RL001not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RL001not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RL001")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRL001').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RL001not_added_services') }}

													{{ Session::forget('RL001added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>						</td>
						<td  @if(session('RL002occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RL002clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100" >
							<div align="center"><big> RL002 </big></div>

							<div align="center"><small> {{  session('RL002occupancy') }} </small></div>




							<div align="center"><input type="checkbox" id="myTextEditBox5" value="RL002" name="myTextEditBox[]" @if(session('RL002occupancy') == 'occupied') disabled @endif  @if(session('RL002')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RL002" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RL002">
									<button type="submit" id="RL002b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRL002"  @if(!session('RL002')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox5').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RL002b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RL002b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRL002" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RL002">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL002added_services'))

															@foreach( session('RL002added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RL002added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL002not_added_services'))

															@foreach( session('RL002not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RL002not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RL002")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRL002').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RL002not_added_services') }}

													{{ Session::forget('RL002added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>												</td>
						<td  @if(session('RL003occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RL003clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100" >
							<div align="center"><big> RL003 </big></div>


							<div align="center"><small> {{  session('RL003occupancy') }} </small></div>


							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox6" value="RL003" name="myTextEditBox[]" @if(session('RL003occupancy') == 'occupied') disabled @endif  @if(session('RL003')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RL003" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RL003">
									<button type="submit" id="RL003b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRL003"  @if(!session('RL003')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox6').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RL003b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RL003b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRL003" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RL003">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL003added_services'))

															@foreach( session('RL003added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RL003added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL003not_added_services'))

															@foreach( session('RL003not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RL003not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RL003")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRL003').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RL003not_added_services') }}

													{{ Session::forget('RL003added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>

					</tr>

					<tr>


						<td  @if(session('RS004occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RS004clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RS004 </big></div>

							<div align="center"><small> {{  session('RS004occupancy') }} </small></div>





							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox7" value="RS004" name="myTextEditBox[]" @if(session('RS004occupancy') == 'occupied') disabled @endif  @if(session('RS004')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RS004" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RS004">
									<button type="submit" id="RS004b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRS004"  @if(!session('RS004')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox7').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RS004b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RS004b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRS004" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RS004">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS004added_services'))

															@foreach( session('RS004added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RS004added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS004not_added_services'))

															@foreach( session('RS004not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RS004not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RS004")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRS004').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RS004not_added_services') }}

													{{ Session::forget('RS004added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>
						<td  @if(session('RS005occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RS005clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RS005 </big></div>

							<div align="center"><small> {{  session('RS005occupancy') }} </small></div>




							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox8" value="RS005" name="myTextEditBox[]" @if(session('RS005occupancy') == 'occupied') disabled @endif  @if(session('RS005')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RS005" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RS005">
									<button type="submit" id="RS005b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRS005"  @if(!session('RS005')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox8').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RS005b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RS005b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRS005" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RS005">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS005added_services'))

															@foreach( session('RS005added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RS005added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RS005not_added_services'))

															@foreach( session('RS005not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RS005not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RS005")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRS005').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RS005not_added_services') }}

													{{ Session::forget('RS005added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>
						<td>

						</td>
						<td>

						</td>
						<td>

						</td>
						<td  @if(session('RL004occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RL004clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RL004 </big></div>

							<div align="center"><small> {{  session('RL004occupancy') }} </small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox9" value="RL004" name="myTextEditBox[]" @if(session('RL001occupancy') == 'occupied') disabled @endif  @if(session('RL004')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RL004" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RL004">
									<button type="submit" id="RL004b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRL004"  @if(!session('RL004')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox9').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RL004b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RL004b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRL004" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RL004">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL004added_services'))

															@foreach( session('RL004added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RL004added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL004not_added_services'))

															@foreach( session('RL004not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RL004not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RL004")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRL004').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RL004not_added_services') }}

													{{ Session::forget('RL004added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>


						</td>
						<td  @if(session('RL005occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RL005clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RL005 </big></div>

							<div align="center"><small>{{  session('RL005occupancy') }}</small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox10" value="RL005" name="myTextEditBox[]" @if(session('RL005occupancy') == 'occupied') disabled @endif  @if(session('RL005')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RL005" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RL005">
									<button type="submit" id="RL005b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRL005"  @if(!session('RL005')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox10').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RL005b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RL005b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRL005" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RL005">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL005added_services'))

															@foreach( session('RL005added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RL005added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RL005not_added_services'))

															@foreach( session('RL005not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RL005not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RL005")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRL005').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RL005not_added_services') }}

													{{ Session::forget('RL005added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>


					</tr>

					<tr>


						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>
						<td width="100" height="100">

						</td>

					</tr>

					<tr>


						<td>

						</td>
						<td>

						</td>
						<td @if(session('RD001occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RD001clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">

							<div align="center"><big> RD001 </big></div>

							<div align="center"><small>{{  session('RD001occupancy') }} </small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox11" value="RD001" name="myTextEditBox[]" @if(session('RD001occupancy') == 'occupied') disabled @endif  @if(session('RD001')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RD001" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RD001">
									<button type="submit" id="RD001b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRD001"  @if(!session('RD001')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox11').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RD001b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RD001b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRD001" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RD001">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD001added_services'))

															@foreach( session('RD001added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RD001added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD001not_added_services'))

															@foreach( session('RD001not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RD001not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RD001")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRD001').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RD001not_added_services') }}

													{{ Session::forget('RD001added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>
						<td @if(session('RD002occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RD002clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RD002 </big></div>

							<div align="center"><small> {{  session('RD002occupancy') }} </small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox12" value="RD002" name="myTextEditBox[]" @if(session('RD002occupancy') == 'occupied') disabled @endif  @if(session('RD002')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RD002" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RD002">
									<button type="submit" id="RD002b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRD002"  @if(!session('RD002')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox12').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RD002b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RD002b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRD002" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RD002">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD002added_services'))

															@foreach( session('RD002added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RD002added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD002not_added_services'))

															@foreach( session('RD002not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RD002not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RD002")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRD002').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RD002not_added_services') }}

													{{ Session::forget('RD002added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>
						<td @if(session('RD003occupancy') == 'occupied') bgcolor="#6495ed" @elseif(session('RD003clean_status') == 'Clean') bgcolor="#00ff7f" @else bgcolor="red" @endif width="100" height="100">
							<div align="center"><big> RD003 </big></div>

							<div align="center"><small> {{  session('RD003occupancy') }} </small></div>



							{{--5th model--}}
							<div align="center"><input type="checkbox" id="myTextEditBox13" value="RD003" name="myTextEditBox[]" @if(session('RD003occupancy') == 'occupied') disabled @endif  @if(session('RD003')) checked data-toggle="toggle" @endif /></div>






							<div align="center"><form class="form-horizontal" role="form" id="RD003" method="POST" action={!! url('/updateres/viewservices') !!}><input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="res_id" value="{{ $res_id  }}">
									<input type="hidden" name="service_time" value="room_block">
									<input type="hidden" name="room_no" value="RD003">
									<button type="submit" id="RD003b" class="btn btn-xs" style="margin-left: 5%;color: darkblue"  data-toggle="modal" data-target="#edittableRD003"  @if(!session('RD003')) disabled @endif>Add Services</button>


									{!!

                                    "<script>
                                        $('#myTextEditBox13').click(function () {
                                        //check if checkbox is checked
                                        if ($(this).is(':checked')) {



                                        $('#RD003b').removeAttr('disabled'); //enable input

                                        } else {
                                        $('#RD003b').attr('disabled', true); //disable input


                                        }
                                        });


                                    </script>"

                                    !!}
								</form>

								<div class="modal fade text-center" id="edittableRD003" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-header">Reservation Id : {{ $res_id  }}</h4>
											</div>


											<div class=" row modal-body">
												{!! Form::open(['method'=>'post','action' => 'ReservationController@update']) !!}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="service_time" value="check_in">
												<input type="hidden" name="room_no" value="RD003">
												<input type ="hidden" name="res_id" id="res_id" value="{{ $res_id  }}">

												<div row>
													<div class="col-md-4"></div>
													<div class="col-md-4" style="margin-top: 3%" align="center">

														{{--@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif--}}
													</div>
													<div class="col-md-4"></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<h4 class="text-info">Added Services</h4>
													</div>


													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD003added_services'))

															@foreach( session('RD003added_services') as $service)
																<div class="checkbox">
																	<label><input type="checkbox" name="added_services[]" id="added_services" value="{{ $service->service_id }}" style="font-size:large"><b>{{  $service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-warning" name="btn" value="remove"  @if(session('RD003added_services') == null) disabled @endif>
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

													<div class="col-md-12" align="left" style="margin-left: 20%">



														@if(session()->has('RD003not_added_services'))

															@foreach( session('RD003not_added_services') as $new_service)
																<div class="checkbox">
																	<label><input type="checkbox" name="add_new_services[]" id="add_new_services" value="{{ $new_service->service_id }}" style="font-size:large"><b>{{  $new_service->service_name }}</b></label>
																</div>
															@endforeach


														@endif



													</div>

													<div class="col-md-12" align="center">
														<br>
														<button type="submit" class="btn btn-primary" name="btn" value="add" @if(session('RD003not_added_services') == null) disabled @endif>
															Add Services
														</button>
													</div>


												</div>

												@if(session('room_no')== "RD003")


													{!!
                                                    "<script>
                                                        $(document).ready(function() {


                                                            $('#edittableRD003').modal('show');
                                                        });
                                                    </script>"

                                                    !!}

													{{ Session::forget('RD003not_added_services') }}

													{{ Session::forget('RD003added_services')}}

													{{ Session::forget('room_no') }}


												@endif




												{!! Form::close() !!}
											</div>
											<div class="modal-footer">


											</div>



										</div>
									</div>
								</div></div>											</td>
						<td>

						</td>
						<td>

						</td>

					</tr>








				</tbody>
			</table>

		</div>

		<div class="col-sm-2">
			<table>
				<tr>
				<td bgcolor="#6495ed" width="25%" height="30%">
				</td>
				<td>
					Occupied
				</td>
				<tr>

				<tr>
					<td  width="25%" height="30%">
					</td>

					<td>
				</td>

				<tr>

				<tr>
					<td bgcolor="#00ff7f" width="25%" height="30%">
					</td>
					<td>
						Clean
					</td>
				<tr>

				<tr>
					<td bgcolor="red" width="25%" height="30%">
					</td>
					<td>
						Dirty
					</td>
				<tr>
			</table>



		</div>
			<div class="col-md-12" align="center" style="margin-top: 1%;margin-left: -1%"><button type="submit" name="block" value="bl" class="btn btn-primary">Block</button>

			</div>


			</form>
	</div>
  </div>









  </body>
</html>