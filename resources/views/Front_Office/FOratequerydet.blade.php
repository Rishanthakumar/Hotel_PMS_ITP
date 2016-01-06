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
	<link href="" rel="stylesheet">

	<!--Links for dropdowns-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


	<!-- These links the date picker-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">

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
		<div class="row">


			@if (session('status') || session('warning'))
				<div class="modal fade text-center" id="modalpopup" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-header"></h4>
								</div>

								<div class=" row modal-body">
									@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
										{{ Session::forget('status')}}
									</div>
									@elseif(session('warning'))
										<div class="alert alert-warning">
											{{ session('warning') }}
											{{ Session::forget('warning')}}
										</div>
									@endif
								</div>
						</div>
					</div>
				</div>

				<script>
					$(document).ready(function(){
							$('#modalpopup').modal('show');
					});
				</script>



			@endif

			<div class="col-md-3">
			</div>

				<div class="col-md-12">
					<h3 class="text-center text-muted">
						Front Office Management System
					</h3>
					<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
					<hr>
					<h4 class="text-center text-muted">
						Room Availability
					</h4>


				</div>
			<div class="col-md-3">
			</div>
		</div>



		<div class="row" style="margin-top: 1%">

			<div class="row">
				<div class="col-md-12">
					<div class="col-sm-5">
						</div>

					<div class="col-sm-2" align="center">
						<button type="button" class="btn btn-primary btn-xs " data-toggle="modal" id="travelagent" data-target="#travelagentrate" style="width: 60%;margin-top: 3.5%" @if( session('customer_type') != 'TRA') disabled @endif >Travel Agent</button><br /> <br />
						<div class="modal fade text-center" id="travelagentrate" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-header alert-warning">
										<button type="button" class="close" data-dismiss="modal">&times;</button>

										<h4 class="text-muted">
											Travel Agent - Rates
										</h4>

									</div>



									<div class=" row modal-body">

										<div class="row" style="margin-top: 3%;margin-left:5%;margin-right:5%">
											<div class="col-md-12">
												<table id="table_id" class="display table-bordered">
													<thead>
													<tr class="alert-success">

														<th>
															Name
														</th>
														<th>
															Percentage
														</th>

														<th>
															Action
														</th>
													</tr>
													</thead>
													<tbody>

													@foreach( $travel_agent_rate as $travel_agent )
														<tr>
															<!-- To get the Status -->

															<td>
																{{ $travel_agent->name }}
															</td>
															<td>
																{{ $travel_agent->rate_percentage }}%
															</td>
															<td>
																<form method="POST" action="{{ url('/ratequery/addrate_travel_agent') }}">
																	<input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
																	<input type="hidden" class="form-control" name="customer_type" value="TRA">
																	<input type="hidden" class="form-control" name="customer_name" value="{{ $travel_agent->name }}">
																	<input type="hidden" class="form-control" name="travel_agent_rate" value="{{ $travel_agent->rate_percentage }}">
																	<input type="hidden" class="form-control" name="cus_id" value="{{ $travel_agent->cus_id }}">
																	<button class="btn btn-primary" id="add" type="add">Add</button>
																</form>

															</td>



														</tr>

													@endforeach



													</tbody>
												</table>

											</div>
										</div>


									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Close
										</button>

									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form class="form-horizontal" role="form" method="POST" action={!! url('/ratequery/querydetails') !!}>
			<div class="row">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="col-md-12" style="margin-left:-4%">

					<div class="col-sm-5">
					</div>
					<div class="col-sm-1">
						<label class="radio-inline"><input  type="radio" class="form-group" name="customer_type" id="chk2" value="FIT" @if(session('customer_type') == "FIT") checked @endif><b>FIT</b></label>
					</div>


					<div class="col-sm-1">
						<label class="radio-inline"><input  type="radio" class="form-group" name="customer_type" id="chk3" value="TRA" @if(session('customer_type') == "TRA") checked @endif><b>TRA</b></label>
					</div>

					<div class="col-sm-1">
						<label class="radio-inline"><input  type="radio" class="form-group" name="customer_type" id="chk1" value="CMP" @if(session('customer_type') == "CMP") checked @endif><b>CMP</b></label>
					</div>



					<script>


						$(".form-group").change(function () {

								$('input[id=chk3]:checked').each(function() {


									$("#travelagent").attr('disabled',false);
									$('#travelagentrate').modal('show');



								});


							$('input[id=chk2]:checked').each(function() {

								$("#travelagent").attr('disabled',true);
							});

							$('input[id=chk1]:checked').each(function() {

								$("#travelagent").attr('disabled',true);
							});


							//This will check the status of radio button onclick

					});
					</script>

					<div class="col-sm-2">


					</div>

					<div class="col-sm-2"></div>



				</div>

				<div class="col-md-12" style="margin-top:2%">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div align="center">
						@if ($errors->has('customer_type')) <p class="alert-danger">{{ $errors->first('customer_type') }}</p>@endif
						</div>
					</div>

					<div class="col-md-3"></div>
				</div>



				<div class="col-md-12" style="margin-top:2%">
					<label for="arrival" class="col-sm-2" style="font-size:large">
						Check-in:
					</label>

					<div class="col-sm-2">
						<input type="date" class="form-control" id="datepicker" placeholder="Select the date" name="arrival" value="@if(session('arrival_date')){{ session('arrival_date') }} @else {{ old('arrival')}} @endif"/>
						@if ($errors->has('arrival')) <p class="alert-danger">{{ $errors->first('arrival') }}</p>@else<br><br>@endif
					</div>


					<label for="nights" class="col-sm-2" style="font-size: large">
						Nights
					</label>

					<div class="col-sm-1">

						<select class="form-control"  name="nights" id="nights">
						{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
							<option value=1>1</option>
							@for($i=2;$i<201;$i++)
								<option value={{ $i}} @if(session('nights') == $i ) selected="selected"@endif>{{$i}}</option>
							@endfor
						</select>
						@if ($errors->has('nights')) <p class="alert-danger">{{ $errors->first('nights') }}</p>@else <br> @endif

					</div>

					<div class="col-sm-1"></div>

					<label for="adults" class="col-sm-2" style="font-size: large">
						Adults
					</label>


					<div class="col-sm-1">
						<select class="form-control"  name="adults" id="adults">
							{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
							<option value=1>1</option>
							@for($i=2;$i<31;$i++)
								<option value={{ $i}} @if(session('adults') == $i|| (old('adults')==$i ) ) selected="selected"@endif>{{$i}}</option>
							@endfor
						</select>
						@if ($errors->has('adults')) <p class="alert-danger">{{ $errors->first('adults') }}</p>@else <br><br>@endif
					</div>
				</div>


				<div class="col-md-12">
					<label for="" class="col-sm-2" style="font-size: large">
						Check-out:
					</label>

					<div class="col-sm-2">
						<input type="date" class="form-control" id="datepicker1" placeholder="Select the date" name="departure" value="@if(session('departure_date')){{ session('departure_date') }} @else {{ old('departure') }} @endif"/>
						@if ($errors->has('departure')) <p class="alert-danger">{{ $errors->first('departure') }}</p>@else<br><br>@endif
					</div>

					<label for="no_of_rooms" class="col-sm-2" style="font-size: large">
						No. of Rooms
					</label>


					<div class="col-sm-1">
						<select class="form-control"  name="ono_of_rooms" id="ono_of_rooms">
							{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
							<option value=1>1</option>

							@for($i=2;$i< 13;$i++)
								<option value={{ $i}} @if(session('ono_of_rooms') == $i|| (old('ono_of_rooms')==$i ) ) selected="selected"@endif>{{$i}}</option>
							@endfor
						</select>
						@if ($errors->has('ono_of_rooms')) <p class="alert-danger">{{ $errors->first('ono_of_rooms') }}</p>@else <br> @endif
					</div>






					<div class="col-sm-1"></div>

					<label for="children" class="col-sm-2" style="font-size: large">
						Children
					</label>

					<div class="col-sm-1">
						<select class="form-control"  name="children" id="children">
							{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
							<option value=0>0</option>
							@for($i=1;$i<21;$i++)
								<option value={{ $i}} @if(session('children') == $i|| (old('children')==$i ) ) selected="selected"@endif>{{$i}}</option>
							@endfor
						</select>
						@if ($errors->has('children')) <p class="alert-danger">{{ $errors->first('children') }}</p>@else<br><br>@endif
					</div>
				</div>




			</div>








			<div class="row">
				<div class="col-md-12">
					<div class="col-sm-5"></div>

						<button type="submit" class="btn btn-group  btn-primary col-sm-2 ">
							Check Room Availability
						</button>

					<div class="col-sm-5"></div>

				</div>
			</div>
			</form>
		</div>



			<div class="col-md-12">
				<!-- div open for 1st col-sm-6 -->
				<div class="col-sm-6">

					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">

					<hr>
					<h3 class="text-center text-primary">
						Rooms
					</h3>
					<hr>
				</div>
				<div class="col-md-3">
				</div>
			</div>

			<div class="row" style="">

			<table class="table">
				<thead>
				<tr>
					<th>
						Room Type
					</th>
					<th>
						Available Rooms
					</th>
					<th>
						Room Details
					</th>
					<th>
						Add Rooms
					</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						Superior
					</td>
					<td>
						{{ session('superior_count') }}
					</td>
					<td>

							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#superior" style="width: 60%">View</button><br /> <br />
							<div class="modal fade text-center" id="superior" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">

										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h3 class="modal-header">
													Superior
												</h3>
										</div>



											<div class=" row modal-body">
												<div class="col-md-12">
													<div class="col-sm-2"></div>
													<div class="col-sm-8">
													<div class="carousel slide" id="carousel-463888">

														<ol class="carousel-indicators">

															<li class="active" data-slide-to="0" data-target="#carousel-463888">
															</li>
															<li data-slide-to="1" data-target="#carousel-463888">
															</li>
															<li data-slide-to="2" data-target="#carousel-463888">
															</li>
															<li data-slide-to="3" data-target="#carousel-463888">
															</li>
														</ol>

														<div class="carousel-inner" >
															<div class="item active" style="width: 100%;height: 100%;">
																<img  alt="Carousel Bootstrap First" src="{{ asset('FO_superior_images/superior1.png') }}" >
															</div>

															<div class="item" style="width: 100%;height: 100%;">
																<img alt="Carousel Bootstrap Second" src="{{ asset('FO_superior_images/superior2.png') }}" >
															</div>

															<div class="item" style="width: 100%;height: 100%;">
																<img alt="Carousel Bootstrap Third" src="{{ asset('FO_superior_images/superior3.png') }}" >
															</div>

															<div class="item" style="width: 100%;height: 100%;">
																<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_superior_images/superior4.png') }}" >
															</div>
														</div>
														<a class="left carousel-control" href="#carousel-463888" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-463888" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
													</div>

														<br>
														<div class="row">

															<div class="col-md-12" align="left">
															</div>

														</div>


														<div class="row">
															<div class="col-md-12 text-info ">




																		<table width="200%">
																			<tr>
																				<th>
																				</th>
																				<th>
																				</th>
																				<th>
																				</th>
																			</tr>

																			<tr align="left">
																				<td>
																					Beds
																				</td>
																				<td>

																				</td>
																				<td>
																					Queen bed

																				</td>
																			</tr>


																			<tr align="left">
																				<td>
																					Occupancy
																				</td>
																				<td>

																				</td>
																				<td>
																					2/3 adults

																				</td>
																			</tr>


																			<tr align="left">
																				<td>
																					Extra bed
																				</td>
																				<td>

																				</td>
																				<td>
																					On request

																				</td>
																			</tr>

																			<tr align="left">
																				<td>
																					Location
																				</td>
																				<td>

																				</td>
																				<td>
																					Ground floor & 01st floor

																				</td>
																			</tr>

																			<tr align="left">
																				<td>
																					View
																				</td>
																				<td>

																				</td>
																				<td>
																					Garden or Mountain View

																				</td>
																			</tr>

																			<tr align="left">
																				<td>
																					Size
																				</td>
																				<td>

																				</td>
																				<td>
																					Approximately 172.8 sq. ft. (16 m²)

																				</td>
																			</tr>

																			<tr align="left">
																				<td>
																					Bathrooms
																				</td>
																				<td>

																				</td>
																				<td>
																					Shower cubicle

																				</td>
																			</tr>




																		</table>




																</div>


														</div>


														<div class="row">
															<hr>
															<h4 class="text-info">Rates</h4>
															<hr>
														</div>

														<div class="row text-danger" align="center">
															<div class="col-sm-2">
															</div>
															<div class="col-sm-8" align="left">
															@foreach( $superior as $sup)
																<li>{{	$sup->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($sup->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($sup->rate,2)}} @endif</li>
															@endforeach
																</div>

															<div class="col-2">
															</div>

														</div>

												</div>
													<div class="col-sm-2"></div>

													</div>



												</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">
													Close
												</button>

											</div>


									</div>
								</div>
							</div>




					</td>
					<td>
						<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelAdd"  @if(session('superior_count')==0 ) disabled @endif>Select</button><br /> <br />
						<div class="col-sm-6">
						</div>
						<div class="modal fade text-center" id="modelAdd" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-header">Superior</h4>
									</div>
									<form method="post" action={{ url('/ratequery/ratedetail/addrooms') }}>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="room_type" value=1>


										<div class=" row modal-body">

											<!-- condtion to check the errors in the room adding form -->

											@if (session('Superiorerstatus'))
												<div class="alert alert-warning">
													{{ session('Superiorerstatus') }}
												</div>
												{{ Session::forget('Superiorerstatus') }}
												@endif
														<!-- end -->

												<div class="col-sm-6">
													<label for="no_of_rooms"  style="font-size: large">
														No. of Rooms
													</label>
												</div>

												<div class="col-sm-6">

													<select class="form-control"  name="no_of_rooms" id="no_of_rooms">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value=1>1</option>

														@for($i=2;$i<=session('superior_count');$i++)
															<option value={{ $i}} @if(old('no_of_rooms')==$i ) selected="selected"@endif>{{$i}}</option>
														@endfor
													</select>
													@if ($errors->has('no_of_rooms')) <p class="alert-danger">{{ $errors->first('no_of_rooms') }}</p>@endif
												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<label for="stay_type"  style="font-size: large">
														Meal type
													</label>
												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<select class="form-control"  name="stay_type" id="stay_type">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value="Select Stay Type">Select Meal Type </option>
														@foreach( $superior as $sup)
															<option value={{ $sup->rate_code}} @if(old('stay_type')==$sup->rate_code ) selected="selected"@endif> {{	$sup->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($sup->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($sup->rate,2)}} @endif</option>
														@endforeach


													</select>
													@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif

												</div>


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Close
											</button>
											<button type="submit" class="btn btn-primary">
												Save changes
											</button>
										</div>

									</form>

									@if(session('Superior'))

											<!-- script for pop up a modal automatically -->
									<script>
										$(document).ready(function() {

											$('#modelAdd').modal('show');
										});
									</script>

									<!-- Script for refresh the page after pop up a error message -->
									<script>
										$('#modelAdd').on('hidden.bs.modal', function () {
											window.location.reload(true);
										})
									</script>
									@endif
								</div>
							</div>
						</div>
					</td>



				</tr>

				<tr>
					<td>
						Deluxe
					</td>
					<td>
						{{ session('deluxe_count') }}
					</td>
					<td>

						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deluxe" style="width: 60%">View</button><br /> <br />
						<div class="modal fade text-center" id="deluxe" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h3 class="modal-header">
											Deluxe
										</h3>
									</div>



									<div class=" row modal-body">
										<div class="col-md-12">
											<div class="col-sm-2"></div>
											<div class="col-md-8">
												<div class="carousel slide" id="carousel-170192">
													<ol class="carousel-indicators">
														<li class="active" data-slide-to="0" data-target="#carousel-170192">
														</li>
														<li data-slide-to="1" data-target="#carousel-170192">
														</li>
														<li data-slide-to="2" data-target="#carousel-170192">
														</li>
														<li data-slide-to="2" data-target="#carousel-170192">
														</li>
													</ol>
													<div class="carousel-inner">
														<div class="item active">
															<img alt="Carousel Bootstrap First" src="{{ asset('FO_deluxe_images/deluxe1.png') }}">
															<div class="carousel-caption">
																<h4>


																</h4>
																<p>

																</p>
															</div>
														</div>
														<div class="item">
															<img alt="Carousel Bootstrap Second" src="{{ asset('FO_deluxe_images/deluxe2.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
														<div class="item">
															<img alt="Carousel Bootstrap Third" src="{{ asset('FO_deluxe_images/deluxe3.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>

														<div class="item">
															<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_deluxe_images/deluxe4.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
													</div>

													<a class="left carousel-control" href="#carousel-170192" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-170192" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
												</div>

												<br>
												<div class="row">

													<div class="col-md-12" align="left">
													</div>

												</div>


												<div class="row">
													<div class="col-md-12 text-info ">




														<table width="200%">
															<tr>
																<th>
																</th>
																<th>
																</th>
																<th>
																</th>
															</tr>

															<tr align="left">
																<td>
																	Beds
																</td>
																<td>

																</td>
																<td>
																	King bed

																</td>
															</tr>


															<tr align="left">
																<td>
																	Occupancy
																</td>
																<td>

																</td>
																<td>
																	3 adults, or 2 adults and 1 child

																</td>
															</tr>


															<tr align="left">
																<td>
																	Extra bed
																</td>
																<td>

																</td>
																<td>
																	On request

																</td>
															</tr>

															<tr align="left">
																<td>
																	Location
																</td>
																<td>

																</td>
																<td>
																	Ground floor & 01st floor

																</td>
															</tr>

															<tr align="left">
																<td>
																	View
																</td>
																<td>

																</td>
																<td>
																	Garden or Mountain View

																</td>
															</tr>

															<tr align="left">
																<td>
																	Specialty
																</td>
																<td>

																</td>
																<td>
																	Bathroom with Bath Tub

																</td>
															</tr>

															<tr align="left">
																<td>
																	Size
																</td>
																<td>

																</td>
																<td>
																	Approximately 331.08 sq.ft. (30.75 m²)

																</td>
															</tr>

															<tr align="left">
																<td>
																	Bathrooms
																</td>
																<td>

																</td>
																<td>
																	Bath tub

																</td>
															</tr>




														</table>




													</div>


												</div>


												<div class="row">
													<hr>
													<h4 class="text-info">Rates</h4>
													<hr>
												</div>

												<div class="row text-danger" align="center">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-8" align="left">
														@foreach( $deluxe as $del)
															<li>{{	$del->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($del->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($del->rate,2)}} @endif</li>
														@endforeach
													</div>

													<div class="col-2">
													</div>

												</div>





											</div>
											<div class="col-sm-2"></div>

										</div>



									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Close
										</button>

									</div>


								</div>
							</div>
						</div>


					</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelAddRoomDel"  @if(session('deluxe_count')==0 ) disabled @endif>Select</button><br /> <br />
						<div class="col-sm-6">
						</div>
						<div class="modal fade text-center" id="modelAddRoomDel" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-header">Deluxe</h4>
									</div>
									<form method="post" action={{ url('/ratequery/ratedetail/addrooms') }}>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="room_type" value=2>


										<div class=" row modal-body">

											<!-- condtion to check the errors in the room adding form -->

											@if (session('Deluxeerstatus'))
												<div class="alert alert-danger">
													{{ session('Deluxeerstatus') }}
												</div>
												{{ Session::forget('Deluxeerstatus') }}
												@endif
														<!-- end -->

												<div class="col-sm-6">
													<label for="no_of_rooms"  style="font-size: large">
														No. of Rooms
													</label>
												</div>

												<div class="col-sm-6">
													<select class="form-control"  name="no_of_rooms" id="no_of_rooms">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value=1>1</option>

														@for($i=2;$i<=session('deluxe_count');$i++)
															<option value={{ $i}} @if(old('no_of_rooms')==$i ) selected="selected"@endif>{{$i}}</option>
														@endfor
													</select>

													@if ($errors->has('no_of_rooms')) <p class="alert-danger">{{ $errors->first('no_of_rooms') }}</p>@endif
												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<label for="stay_type"  style="font-size: large">
														Meal type
													</label>
												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<select class="form-control"  name="stay_type" id="stay_type">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value="Select Stay Type">Select Meal Type </option>
														@foreach( $deluxe as $del)
															<option value={{ $del->rate_code}}@if(old('stay_type')==$del->rate_code ) selected="selected"@endif>{{	$del->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($del->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($del->rate,2)}} @endif</option>
														@endforeach


													</select>
													@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif
												</div>


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Close
											</button>
											<button type="submit" class="btn btn-primary">
												Save changes
											</button>
										</div>

									</form>
									@if(session('Deluxe'))
										<script>
											$(document).ready(function() {

												$('#modelAddRoomDel').modal('show');
											});
										</script>

										<!-- Script for refresh the page after pop up a error message -->
										<script>
											$('#modelAddRoomDel').on('hidden.bs.modal', function () {
												window.location.reload(true);
											})
										</script>

									@endif
								</div>
							</div>
					</td>

					<td>

					</td>

				</tr>


				<tr>
					<td>
						Luxury
					</td>
					<td>
						{{ session('luxury_count') }}
					</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#luxury" style="width: 60%">View</button><br /> <br />
						<div class="modal fade text-center" id="luxury" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>

										<h3 class="modal-header">
											Luxury
										</h3>
									</div>



									<div class=" row modal-body">
										<div class="col-md-12">
											<div class="col-sm-2"></div>
											<div class="col-md-8">
												<div class="carousel slide" id="carousel-646810">
													<ol class="carousel-indicators">
														<li class="active" data-slide-to="0" data-target="#carousel-646810">
														</li>
														<li data-slide-to="1" data-target="#carousel-646810">
														</li>
														<li data-slide-to="2" data-target="#carousel-646810">
														</li>
														<li data-slide-to="3" data-target="#carousel-646810">
														</li>
													</ol>
													<div class="carousel-inner">
														<div class="item active">
															<img alt="Carousel Bootstrap First" src="{{ asset('FO_luxury_images/luxury1.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
														<div class="item">
															<img alt="Carousel Bootstrap Second" src="{{ asset('FO_luxury_images/luxury2.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
														<div class="item">
															<img alt="Carousel Bootstrap Third" src="{{ asset('FO_luxury_images/luxury3.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
														<div class="item">
															<img alt="Carousel Bootstrap Fourth" src="{{ asset('FO_luxury_images/luxury4.png') }}">
															<div class="carousel-caption">
																<h4>

																</h4>
																<p>

																</p>
															</div>
														</div>
													</div> <a class="left carousel-control" href="#carousel-646810" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-646810" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
												</div>


												<br>
												<div class="row">

													<div class="col-md-12" align="left">
													</div>

												</div>


												<div class="row">
													<div class="col-md-12 text-info ">




														<table width="200%">
															<tr>
																<th>
																</th>
																<th>
																</th>
																<th>
																</th>
															</tr>

															<tr align="left">
																<td>
																	Beds
																</td>
																<td>

																</td>
																<td>
																	King bed

																</td>
															</tr>


															<tr align="left">
																<td>
																	Occupancy
																</td>
																<td>

																</td>
																<td>
																	3 adults, or 2 adults and 1 child

																</td>
															</tr>


															<tr align="left">
																<td>
																	Extra bed
																</td>
																<td>

																</td>
																<td>
																	On request

																</td>
															</tr>

															<tr align="left">
																<td>
																	Location
																</td>
																<td>

																</td>
																<td>
																	Ground floor & 01st floor

																</td>
															</tr>

															<tr align="left">
																<td>
																	View
																</td>
																<td>

																</td>
																<td>
																	Garden or Mountain View

																</td>
															</tr>

															<tr align="left">
																<td>
																	Specialty
																</td>
																<td>

																</td>
																<td>
																	Balcony with panoramic views

																</td>
															</tr>

															<tr align="left">
																<td>
																	Size
																</td>
																<td>

																</td>
																<td>
																	Approximately 207.69 sq.ft. (19.2 m²)

																</td>
															</tr>

															<tr align="left">
																<td>
																	Bathrooms
																</td>
																<td>

																</td>
																<td>
																	Shower cubicle

																</td>
															</tr>




														</table>




													</div>


												</div>


												<div class="row">
													<hr>
													<h4 class="text-info">Rates</h4>
													<hr>
												</div>

												<div class="row text-danger" align="center">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-8" align="left">
														@foreach( $luxury as $lux)
															<li>{{	$lux->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($lux->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($lux->rate,2)}} @endif</li>
														@endforeach
													</div>

													<div class="col-2">
													</div>

												</div>


											</div>
											<div class="col-sm-2"></div>

										</div>



									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Close
										</button>

									</div>


								</div>
							</div>
						</div>

					</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelAddlux" @if(session('luxury_count')==0 ) disabled @endif>Select</button><br /> <br />
						<div class="col-sm-6">
						</div>
						<div class="modal fade text-center" id="modelAddlux" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-header">Luxury</h4>
									</div>
									<form method="post" action="{{ url('/ratequery/ratedetail/addrooms') }}" name=3>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="room_type" value=3>

										<div class=" row modal-body">

											<!-- condtion to check the errors in the room adding form -->

											@if (session('Luxuryerstatus'))
												<div class="alert alert-danger">
													{{ session('Luxuryerstatus') }}
												</div>
												{{ Session::forget('Luxuryerstatus') }}
												@endif
														<!-- end -->

												<div class="col-sm-6">
													<label for="no_of_rooms"  style="font-size: large">
														No. of Rooms
													</label>
												</div>

												<div class="col-sm-6">
													<select class="form-control"  name="no_of_rooms" id="no_of_rooms">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value=1>1</option>

														@for($i=2;$i<=session('luxury_count');$i++)
															<option value={{ $i}} @if(old('no_of_rooms')==$i ) selected="selected"@endif>{{$i}}</option>
														@endfor
													</select>

												@if ($errors->has('no_of_rooms')) <p class="alert-danger">{{ $errors->first('no_of_rooms') }}</p>@endif

												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<label for="stay_type"  style="font-size: large">
														Meal type
													</label>
												</div>

												<div class="col-sm-6" style="margin-top: 3%">
													<select class="form-control"  name="stay_type" id="stay_type">
														{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}
														<option value="Select Stay Type">Select Meal Type </option>
														@foreach( $luxury as $lux)
															<option value={{ $lux->rate_code}} @if(old('stay_type')==$lux->rate_code ) selected="selected"@endif>{{	$lux->stay_type}} : @if(session('customer_type')=='TRA')$ {{ number_format($lux->rate*session('travel_agent_rate')/100,2)}} @else $ {{ number_format($lux->rate,2)}} @endif</option>
														@endforeach

													</select>
													@if ($errors->has('stay_type')) <p class="alert-danger">{{ $errors->first('stay_type') }}</p>@endif

												</div>


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Close
											</button>
											<button type="submit" class="btn btn-primary">
												Save changes
											</button>
										</div>

									</form>
									@if(session('Luxury'))
										<script>
											$(document).ready(function() {

												$('#modelAddlux').modal('show');
											});
										</script>

										<!-- Script for refresh the page after pop up a error message -->
										<script>
											$('#modelAddlux').on('hidden.bs.modal', function () {
												window.location.reload(true);
											})
										</script>

									@endif
								</div>
							</div>
						</div>
					</td>

					<td>

					</td>

				</tr>





				</tbody>

				</table>

				</div>
		</div>

			<!-- div open for 2nd col-sm-6 -->
	<div class="col-sm-6">

	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">

			<hr>
			<h3 class="text-center text-primary">
				Summary
			</h3>
			<hr>
		</div>
		<div class="col-md-3">
		</div>
	</div>





	<div class="row" style="margin-left: 10%;margin-right: 10%">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>
							Type
						</th>
						<th>
							Meal_Type
						</th>
						<th>
							#Rooms
						</th>
						<th>
							Rate($)
						</th>
						<th>
							Total($)
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							Superior
						</td>
						<td>
							@foreach($superior as $sup) @if(session('Superiorrate_code') == $sup->rate_code) <small>{{$sup->stay_type}}</small> @endif @endforeach
						</td>
						<td>
							{{ $superior_rooms =session('Superiorrooms') }}

						</td>
						<td>
							{{ $superior_rate = number_format(session('Superiorrate'),2) }}

						</td>
						<td>
							{{ $superior_total = number_format($superior_rooms*$superior_rate,2) }}
						</td>

							<td>
								@if($superior_rooms != 0)

									<form method="post" action="{{ url('/ratequery/ratedetail/summary') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn-link"  id="clear" value="Superior" name="button">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
									</form>

								@endif
							</td>

					</tr>
					<tr>
						<td>
							Deluxe
						</td>
						<td>
							@foreach($deluxe as $del) @if(session('Deluxerate_code') == $del->rate_code) <small>{{$del->stay_type}}</small> @endif @endforeach
						</td>
						<td>
							{{ $deluxe_rooms =session('Deluxerooms') }}

						</td>
						<td>
							{{ $deluxe_rate = number_format(session('Deluxerate'),2) }}

						</td>
						<td>
							{{ $deluxe_total = number_format($deluxe_rooms*$deluxe_rate,2) }}
						</td>

							<td>
								@if($deluxe_rooms != 0)

									<form method="post" action="{{ url('/ratequery/ratedetail/summary') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn-link"  id="clear" value="Deluxe" name="button">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
									</form>

						@endif

					</tr>
					<tr >
						<td>
							Luxury
						</td>
						<td>
							@foreach($luxury as $lux ) @if(session('Luxuryrate_code') == $lux->rate_code) <small>{{$lux->stay_type}}</small> @endif @endforeach


						</td>
						<td>
							{{ $luxury_rooms =session('Luxuryrooms') }}

						</td>
						<td>
							{{ $luxury_rate = number_format(session('Luxuryrate'),2) }}

						</td>
						<td>


							{{ number_format($luxury_rooms*$luxury_rate,2) }}
						</td>

							<td>
								@if($luxury_rooms != 0)

									<form method="post" action="{{ url('/ratequery/ratedetail/summary') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn-link"  id="clear" value="Luxury" name="button">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
									</form>

								@endif
							</td>

					</tr>
					<tr >
						<td>
							<b>Nights</b>
						</td>
						<td>
							{{ session('nights') }}
						</td>
						<td>
							<b>Rates Total</b>
						</td>
						<td>
							<?php
								$total = number_format(($luxury_rooms*$luxury_rate + $deluxe_rooms+$deluxe_rate +$superior_rooms*$superior_rate)*session('nights'),2);
								echo  "<b>".$total."</b>";
							?>
						</td>
						<td>

						</td>

					</tr>

				</tbody>
			</table>
		</div>
	</div>

		<!-- div close for 2nd col-sm-6-->
		</div>
			<!-- div close for col-md-12 -->
			</div>

		<div class="row" style="margin-bottom: 1%;margin-right: 5%;margin-left: 5%">
			<div class="col-md-12">
				<div class="btn-group col-sm-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#waitlist" style="width: 100%"  @if(!session('reservation_checked'))disabled @endif >Waitlist</button><br /> <br />
					<div class="modal fade text-center" id="waitlist" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-header"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>     Waitlist   </h4>
								</div>

								<form method="POST" class="form-horizontal" role="form">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class=" row modal-body">
									<div class="alert alert-warning">
									<label for="reason"  style="font-size: medium">
										Do you want to waitlist the current reservation?
									</label>
									</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Cancel
									</button>



									<div class="btn-group">
										<a class="btn btn-primary" href="{!! url('/waitlistform') !!}" style="width:100%">OK
										</a>
									</div>

								</div>


								</form>

							</div>
						</div>
					</div>

				</div>

				<div class="col-sm-1">
				</div>

				<div class="btn-group col-sm-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#turnaway" style="width: 100%" @if(!session('reservation_checked'))disabled @endif>Turnaway</button><br /> <br />
					<div class="modal fade text-center" id="turnaway" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-header"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>     Turnaway   </h4>
								</div>


								<form method="POST" class="form-horizontal" role="form" action={!! url('/ratequery/ratedetail/turnaway')  !!}  >
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class=" row modal-body">
									<label for="reason"  style="font-size: large">
										Reason
									</label>


									<div style="margin-left: 5%;margin-right: 5%">
										<textarea class="form-control " name="reason_for_turnaway" rows="2" c /></textarea>
									</div>
									@if ($errors->has('reason_for_turnaway')) <p class="alert-danger">{{ $errors->first('reason_for_turnaway') }}</p>@endif



								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button>


									<button type="submit" class="btn btn-primary" name="btn" value="save" accesskey="s" >
										Save changes
									</button>
								</div>

								</form>

								@if(session('turnaway'))
									<script>
										$(document).ready(function() {

											$('#turnaway').modal('show');
										});
									</script>

									<!-- Script for refresh the page after pop up a error message -->
									<script>
										$('#turnaway').on('hidden.bs.modal', function () {
											window.location.reload(true);
										})
									</script>

									{{ Session::forget('turnaway') }}

								@endif

							</div>
						</div>
					</div>

				</div>

				<div class="col-sm-1">
				</div>


				<div class="btn-group col-sm-2">
					<a class="btn btn-success  btn-block" href={!! url('/ratequery/ratedetail/check_room') !!} style="width:100%">Reserve
					</a>
				</div>


				<div class="col-sm-1">
				</div>

				<div class="btn-group col-sm-2">
					<a class="btn btn-warning  btn-block" href={!! url('/FO_mainpage') !!} style="width:100%">Cancel
					</a>
				</div>




			</div>
</div>
	</div>

	<div class="modal fade text-center" id="nightsmodalpopup" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">


					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br>
				</div>


				<div class=" row modal-body">

					<div class="alert alert-danger">
						<strong>Warning : </strong> You are about to reserve more than 2 weeks!
					</div>

					<hr>

					<div class="col-sm-offset-6 col-sm-10">

						<button type="submit" class="btn btn-default" data-dismiss="modal"  > OK </button>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade text-center" id="nightsmodalpopup200" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">


					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br>
				</div>


				<div class=" row modal-body">

					<div class="alert alert-danger">
						<strong>Warning : </strong> You can't reserve not more than 200 days!
					</div>

					<hr>

					<div class="col-sm-offset-6 col-sm-10">

						<button type="submit" class="btn btn-default" data-dismiss="modal"  > OK </button>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade text-center" id="adultmodalpopup" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">


					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br>
				</div>


				<div class=" row modal-body">

					<div class="alert alert-danger">
						<strong>Warning : </strong> Occupancy is exceeded for room type. Additional Rooms need to be booked for requested number of occupants.
					</div>

					<hr>

					<div class="col-sm-offset-6 col-sm-10">

						<button type="submit" class="btn btn-default" data-dismiss="modal"  > OK </button>

					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade text-center" id="roommodalpopup" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">


					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br>
				</div>


				<div class=" row modal-body">

					<div class="alert alert-danger">
						<strong>Warning : </strong> The specified number of room(s)  must not exceed the specified number of Occupants
					</div>

					<hr>

					<div class="col-sm-offset-6 col-sm-10">

						<button type="submit" class="btn btn-default" data-dismiss="modal"  > OK </button>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade text-center" id="exceedmodalpopup" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">


					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br>
				</div>


				<div class=" row modal-body">

					<div class="alert alert-danger">
						<strong>Warning : </strong> The requested number of room(s) is/are not available. Please re-insert your inputs
					</div>

					<hr>

					<div class="col-sm-offset-6 col-sm-10">

						<button type="submit" class="btn btn-default" data-dismiss="modal"  > OK </button>

					</div>
				</div>
			</div>
		</div>
	</div>






	<script>


			//function to get the difference between dates

				function getDiff(){


					var arrival = $("#datepicker" ).datepicker( "getDate" );

					var departure = $("#datepicker1" ).datepicker( "getDate" );


				}


				//datepicker
				$("#datepicker").datepicker({
					dateFormat:'yy-mm-dd',
					minDate:0,
					changeMonth: true,
					changeYear: true,
					defaultDate:new Date(),

					//on change of the date
					onSelect:function(){



						var arrival =$(this).datepicker( 'getDate' );
						var departure = $("#datepicker1" ).datepicker( "getDate" );

						var _MS_PER_DAY = 1000 * 60 * 60 * 24;
						var utc1 = Date.UTC(arrival.getFullYear(), arrival.getMonth(), arrival.getDate());
						var utc2 = Date.UTC(departure.getFullYear(), departure.getMonth(), departure.getDate());


						var difference = Math.abs(Math.floor((utc2 - utc1) / _MS_PER_DAY));

						$("#nights").val(difference);


						/*if(arrival > departure){
*/

							$.datepicker._clearDate('#datepicker1');
						$("#nights").val(0);
						/*}
*/
					},
					//onclose set the min date of the departure
					onClose: function(selectedDate) {

						// Set the minDate of 'to' as the selectedDate of 'from'
						var dt=new Date(selectedDate);


						dt.setDate(dt.getDate() + 1);


						$("#datepicker1").datepicker("option", "minDate", dt);
					}


				});





		</script>


	<script>

				$('#datepicker1').datepicker({
					dateFormat:'yy-mm-dd',
					changeMonth: true,
					changeYear: true,


					onClose:function(){
						var departure =$(this).datepicker( 'getDate' );
						var arrival = $("#datepicker" ).datepicker( "getDate" );


						var _MS_PER_DAY = 1000 * 60 * 60 * 24;
						var utc1 = Date.UTC(arrival.getFullYear(), arrival.getMonth(), arrival.getDate());
						var utc2 = Date.UTC(departure.getFullYear(), departure.getMonth(), departure.getDate());


						var difference = Math.abs(Math.floor((utc2 - utc1) / _MS_PER_DAY));

						$("#nights").val(difference);

						if(difference > 200)
						{


							$('#nightsmodalpopup200').modal('show');
							$.datepicker._clearDate('#datepicker1');


						}
						else{
							if(difference > 14)
							{
								$('#nightsmodalpopup').modal('show');

							}
						}

					}
				});

				</script>



		<script>

			$('#nights').on('change',function(e){

				console.log(e);

				var po=parseInt(e.target.value);
				//console.log(po);


				var dt = $("#datepicker" ).datepicker( "getDate" );



				dt.setDate(dt.getDate() + po);



				if(!isNaN(dt)) {
					$("#datepicker1").datepicker("setDate", dt);


				}

				if(po > 14)
				{

					//	alert("error")
					$('#nightsmodalpopup').modal('show');



				}

				var arrival = document.getElementById('datepicker').value;
				var departure = document.getElementById('datepicker1').value;








			});
			$('#ono_of_rooms').on('change',function(e){
					console.log(e);

					var rooms=parseInt(e.target.value);
					//console.log(po);


				var adult=document.getElementById('adults').value;
				var children = document.getElementById('children').value;


				var possibleoccupants = parseInt(rooms)*3;

				var totaloccupants = parseInt(adult) + parseInt(children);


				if( totaloccupants > possibleoccupants )
				{


					$('#adultmodalpopup').modal('show');
					var setrooms = totaloccupants/3;
					var remainder = totaloccupants%3;

					if(remainder == 0)
					{
						document.getElementById('ono_of_rooms').value = setrooms;

					}
					else{
						document.getElementById('ono_of_rooms').value = parseInt(setrooms) + 1;
					}
				}

				if(rooms > totaloccupants)
				{
					$('#roommodalpopup').modal('show');
					document.getElementById('ono_of_rooms').value = parseInt(adult);
				}

			});




			$('#adults').on('change',function(e){
				console.log(e);

				var adult=parseInt(e.target.value);
				//console.log(po);


				var rooms=document.getElementById('ono_of_rooms').value;
				var children = document.getElementById('children').value;


				var possibleoccupants = parseInt(rooms)*3;

				var totaloccupants = parseInt(adult) + parseInt(children);

				var setrooms = totaloccupants/3;
				var remainder = totaloccupants%3;

				if(setrooms < 13) {
					if (totaloccupants > possibleoccupants) {
						$('#adultmodalpopup').modal('show');
						if (remainder == 0) {
							document.getElementById('ono_of_rooms').value = setrooms;
						}
						else {
							document.getElementById('ono_of_rooms').value = parseInt(setrooms) + 1;
						}
					}

					if (rooms > totaloccupants) {
						$('#roommodalpopup').modal('show');

						if (remainder == 0) {
							document.getElementById('ono_of_rooms').value = setrooms;
						}
						else {
							document.getElementById('ono_of_rooms').value = parseInt(setrooms) + 1;
						}
					}
				}
				else{

					$('#exceedmodalpopup').modal('show');
					document.getElementById('ono_of_rooms').value = 1;
					document.getElementById('adults').value = 1;
					document.getElementById('children').value =0;

				}

			});


			$('#children').on('change',function(e){
				console.log(e);

				var children=parseInt(e.target.value);
				//console.log(po);


				var rooms=document.getElementById('ono_of_rooms').value;
				var adult = document.getElementById('adults').value;

				var totaloccupants = parseInt(adult) + children;
				var possibleoccupants = parseInt(rooms)*3;
				var setrooms = totaloccupants/3;
				var remainder = totaloccupants%3;




				if(setrooms < 13) {
					if (totaloccupants > possibleoccupants) {
						$('#adultmodalpopup').modal('show');

						if (remainder == 0) {
							document.getElementById('ono_of_rooms').value = setrooms;
						}
						else {
							document.getElementById('ono_of_rooms').value = parseInt(setrooms) + 1;
						}
					}


					if (rooms > totaloccupants) {
						$('#roommodalpopup').modal('show');

						if (remainder == 0) {
							document.getElementById('ono_of_rooms').value = setrooms;
						}
						else {
							document.getElementById('ono_of_rooms').value = parseInt(setrooms) + 1;
						}
					}

				}
				else{

					$('#exceedmodalpopup').modal('show');
					document.getElementById('ono_of_rooms').value = 1;
					document.getElementById('adults').value = 1;
					document.getElementById('children').value =0;

				}



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


		<!--Functions of date and timepicker-->



  </body>
</html>