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
			  $('#com_table').DataTable();
		  } );

	  </script>

  </head>
  <body>

  @if (session('succ_status')||session('error_status'))
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
					  @elseif(session('error_status'))
						  <div class="alert alert-danger">
							  {{ session('error_status') }}
						  </div>
					  @endif

				  </div>

				  {{ Session::forget('succ_status')}}
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
		<div class="row" >

				<div class="row">

					<div class="col-md-12">
							<div>
							<h3 class="text-muted text-center">
								Customer Profile Management System
							</h3>
								<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
								@if(session('reserve'))
									<div class="btn-group" align="right">
										<a class="btn btn-default  btn-block" href="{!! url('/ratequery') !!}" style="width:100%">Back
										</a>
									</div>
								@endif


								<br>
							<hr>
							<h4 class="text-muted text-center">
								Guest Profile Management - Company Customer List
							</h4>
								<br>

							</div>

					</div>

				</div>

				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
							<li >
								<a href="{{ url('/guest_profile/individual_list') }}">Individual</a>
							</li>
							<li class="active">
								<a href="#">Company</a>
							</li>
							<li>
								<a href="{{ url('/guest_profile/travel_agent_list') }}">Travel Agent</a>
							</li>
							<li>
								<a href="{{ url('/guest_profile/member_list') }}">Member</a>
							</li>

						</ul>

					</div>

				</div>




				<div class="row" style="margin-top: 5%">
					<table  id="com_table" class="table table-hover table-condensed table-bordered">



						<thead>
						<tr class="success">
							<th>
								Guest-ID
							</th>
							<th>
								Name
							</th>

							<th >
								Lane Number
							</th>
							<th>
								Lane 1
							</th>

							<th>
								Lane 2
							</th>
							<th>
								City
							</th>

							<th>
								Tel No.
							</th>

							<th>
								E-mail
							</th>

							<th>
								Action
							</th>


						</tr>
						</thead>
						<tbody>
						@foreach($company as $compan)
							<tr class="active" >
								<td>
									{{$compan -> cus_id}}

								</td>
								<td>
									{{$compan -> name}}

								</td>
								<td>
									{{$compan ->address}}

								</td>
								<td>
									{{$compan ->lane1}}

								</td>
								<td>
									{{$compan ->lane2}}

								</td>
								<td>
									{{$compan ->city}}

								</td>

								<td>
									{{$compan -> contact_no}}

								</td>
								<td>
									{{$compan -> email}}

								</td>


								<td>
									<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{$compan -> cus_id}}" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
									<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#d{{$compan -> cus_id}}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>


									<div class="modal fade" id="{{$compan -> cus_id}}" role="dialog">
										<div class="modal-dialog">


											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title text-center">Edit Customer Details : {{ $compan -> cus_id}}</h4>
												</div>
												<div class="modal-body">
													<div class="row" style="margin-top: 5%">
														<form class="form-horizontal" method="post" role="form" action="{{ url('/guest_profile/company_list') }}"><!--action="{{url('Editprofile')}}"-->
															<input type="hidden" name="_token" id="csrf-token" value="{{csrf_token() }}" />

															<div class="col-md-12">


																<div class="form-group " style="margin-left: 10%" >

																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Customer ID
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="cusid" class="form-control" id="prfname" readonly value="{{ $compan -> cus_id}}">
																	</div>
																</div>

																@if (Session::has ('exception'))
																	<div class="alert alert-danger">

																		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
																		<strong>Failed : </strong> {{Session::get('exception','')}}

																		@endif

																	</div>





																<div class="form-group " style="margin-left: 10%" >

																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Name
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="fname" class="form-control" id="prfname" value="{{ $compan -> name}}">
																		@if ($errors->has('fname')) <p class="alert-danger">{{ $errors->first('fname') }}</p>@else @endif
																	</div>
																</div>




																<div class="form-group " style="margin-left: 10%" >


																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Lane Number
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="address" class="form-control" id="prfname" value="{{ $compan ->address}}">
																		@if ($errors->has('address')) <p class="alert-danger">{{ $errors->first('address') }}</p>@else @endif
																	</div>

																</div>

																<div class="form-group " style="margin-left: 10%" >


																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Line 1
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="lane1" class="form-control" id="prfname" value="{{ $compan ->lane1}}">
																		@if ($errors->has('lane1')) <p class="alert-danger">{{ $errors->first('lane1') }}</p>@else @endif
																	</div>

																</div>

																<div class="form-group " style="margin-left: 10%" >


																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Line 2
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="lane2" class="form-control" id="prfname" value="{{ $compan ->lane2}}">
																		@if ($errors->has('lane2')) <p class="alert-danger">{{ $errors->first('lane2') }}</p>@else @endif
																	</div>

																</div>

																<div class="form-group " style="margin-left: 10%" >


																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		City
																	</label>

																	<div class="col-sm-6">
																		<input type="text" name="city" class="form-control" id="prfname" value="{{ $compan ->city}}">
																		@if ($errors->has('city')) <p class="alert-danger">{{ $errors->first('city') }}</p>@else @endif
																	</div>

																</div>


																<div class="form-group " style="margin-left: 10%" >

																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		Tel No.
																	</label>


																	<div class="col-sm-6">
																		<input type="text" name="tno" class="form-control" id="prfname" value="{{$compan -> contact_no}}">
																		@if ($errors->has('tno')) <p class="alert-danger">{{ $errors->first('tno') }}</p>@else @endif
																	</div>
																</div>

																<div class="form-group " style="margin-left: 10%" >

																	<label for="profilename" class="col-sm-4" style="font-size: large">
																		E-mail
																	</label>


																	<div class="col-sm-6">
																		<input type="text" name="email" class="form-control" id="prfname" value="{{$compan -> email}}">
																		@if ($errors->has('email')) <p class="alert-danger">{{ $errors->first('email') }}</p>@else @endif
																	</div>
																</div>



																<div class="form-group " style="margin-left: 10%" >



																	<div class="row" style="margin: auto; margin-top: 2%">
																		<div class="col-md-12">


																			<div class="col-sm-4">
																			</div>

																			<div class="btn-group col-sm-3" style="margin-left: -1%" >
																				<button type="submit" class="btn btn-primary btn-block" style= "width:80%">
																					Edit
																				</button>
																			</div>

																			<div class="col-sm-1">
																			</div>


																		</div>

																	</div>
																</div>


													</div>




														</form>


												</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
											</div>
										</div>
											</div>
										</div>



											<!--Modal for delete button-->

											<div  id="d{{$compan -> cus_id}}" class="modal fade" role="dialog">
												<div class="modal-dialog ">

													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title" style="text-align: center">Delete Travel Agent : {{$compan -> cus_id}}</h4>
														</div>
														<div class="modal-body">
															<div class="row" style="margin-top: 5%">

																<div id="deleteWarning" class="alert alert-warning">
																	<strong style="margin-left: 25%">Warning!</strong> You are about to delete a record!
																</div>


																<form method="post" class="form-horizontal" role="form" action="{{url('companydelete')}}">
																	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

																	<div class="col-md-12">


																		<div class="form-group " style="margin-left: 10%" >

																			<label for="profilename" class="col-sm-4" style="font-size: large">
																				Customer ID
																			</label>

																			<div class="col-sm-6">
																				<input type="text" name="cusid" class="form-control" id="prfname" readonly value= "{{$compan -> cus_id}}">

																			</div>
																		</div>

																		<div class="row" style="margin: auto; margin-top: 2%">
																			<div class="col-md-12">


																				<div class="col-sm-3">
																				</div>

																				<div class="btn-group col-sm-2">
																					<button type="submit" class="btn btn-primary btn-block" style= "width:120%;margin-left: 140%">
																						Delete
																					</button>
																				</div>
																			</div>

																		</div>
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										<div>
										</div>

						@endforeach
					</table>
				</div>
		</div>

	</div>



			<div class="row" style="margin-top: 2%">
				<div class="form-group col-md-12" >

					<div class="col-sm-3"  >
					</div>

					<div class="col-sm-3">
						<div class="btn-group"> <a class="btn btn-primary "  href={!! url('/guest_profile/company_list/create') !!} >Create New Company Profile</a></div>
					</div>

					<div class="col-sm-3">
						<div class="btn-group"> <a class="btn btn-warning " @if(session('reserve')) href="{!! url('/registerind') !!}"@elseif(session('waitlist'))href="{!! url('/waitlistform') !!}"@else href="{!! url('/guest_profile') !!}"  @endif style="width: 350%">Close</a></div>
					</div>

					<div class="col-sm-3" >
					</div>
				</div>
			</div>



		</div>
	</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>