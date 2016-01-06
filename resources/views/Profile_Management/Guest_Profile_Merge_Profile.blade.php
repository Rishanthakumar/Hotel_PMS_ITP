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
			  $('#merge_table').DataTable();
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
								Merge Profiles
							</h4>
							</div>

					</div>

				</div>


			<div class="col-sm-1" style="margin-left: 94%">
				<div class="btn-group btn-block"> <a class="btn btn-default btn-block"  href={!! url('/guest_profile') !!} >Home</a></div>
			</div>

				<div class="row" style="margin-top: 5%">
					<table class="table table-hover table-bordered" id="merge_table">
						<thead>
						<tr class="success">
							<th>
								Profiles with same Name

							</th>

							<th>

								Options
							</th>

						</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
							<td>
								{{$user->fname}} {{$user->lname}}
							</td>
							<td>
								<button type="submit" class="btn btn-primary" data-toggle="modal" style="margin-left: 40%" data-target="#{{$user -> cus_id}}"> Merge </button>
								<div class="modal fade" id="{{$user -> cus_id}}" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title text-center">Merge Profiles</h4>
											</div>
											<form class="form-horizontal" role="form" method="post" action="{{url('/guest_profile/mergeprofile')}}">
												<div class="modal-body">
													<div class="row" style="margin-top: 5%">
														@foreach($profile2 as $pro)
															@if($pro->fname==$user->fname && $pro->lname==$user->lname &&$pro->date_of_birth==$user->date_of_birth &&   $pro->cus_id!=$user->cus_id)


															<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

														<input type="hidden" name="oldcus_id" readonly value= "{{$user -> cus_id}}">
																<input type="hidden" name="newcus_id"readonly value= "{{$pro -> cus_id}}">

																<div class="col-md-12">

															<div class="form-group " style="margin-left: 10%" >

																<label for="profilename" class="col-sm-4" style="font-size: large">
																	First Name
																</label>

																<div class="col-sm-6">
																	<input type="text" name="oldfname" class="form-control" id="prfname"readonly value="{{ $user->fname }}">
																	<input type="text" name="newfname" class="form-control" id="prfname" readonly value="{{ $pro->fname }}">
																</div>
															</div>
															<br>

															<div class="form-group " style="margin-left: 10%">

																<label for="profilename" class="col-sm-4" style="font-size: large">
																	Last Name
																</label>

																<div class="col-sm-6">
																	<input type="text" name="oldlname" class="form-control" id="prfname" readonly value="{{ $user->lname }}">
																	<input type="text" name="newlname" class="form-control" id="prfname" readonly value="{{ $pro->lname }}">
																</div>
															</div>

															<br>

															<div class="form-group " style="margin-left: 10%" >

																<label for="profilename" class="col-sm-4" style="font-size: large">
																	Birthday
																</label>


																<div class="col-sm-6">
																	<input type="text" name="oldtno" class="form-control" id="prfname" readonly value="{{$user->date_of_birth}}">
																	<input type="text" name="newtno" class="form-control" id="prfname" readonly value="{{$pro->date_of_birth}}">
																</div>
															</div>
															<br>
															<div class="form-group " style="margin-left: 10%" >

																<label for="profilename" class="col-sm-4" style="font-size: large">
																	Title
																</label>

																<div class="col-sm-6">
																	<input type="text" name="oldaddress" class="form-control" id="prfname" readonly value="{{ $user->title }}">
																	<input type="text" name="newaddress" class="form-control" id="prfname" readonly value="{{ $pro->title }}">
																</div>

															</div>
															<br>

															<div class="form-group " style="margin-left: 10%" >
																<label for="profilename" class="col-sm-4" style="font-size: large">
																	Passport
																</label>

																<div class="col-sm-6">
																	<input type="text" name="oldpass"  class="form-control" id="prfname" readonly value="{{ $user->passport }}">
																	<input type="text" name="newpass"  class="form-control" id="prfname" readonly value="{{ $pro->passport }}">
																</div>

															</div>
															<br>

															<div class="form-group " style="margin-left: 10%" >

																<label for="profilename" class="col-sm-4" style="font-size: large">
																	NIC
																</label>
																<div class="col-sm-6">
																	<input type="text" name="oldNIC"  class="form-control" id="prfname" readonly value="{{ $user->NIC_passport }}">
																	<input type="text" name="newNIC"  class="form-control" id="prfname" readonly value="{{ $pro->NIC_passport }}">
																</div>

															</div>

															<br>
																@endif
																@endforeach

														</div>

														<div class="row" style="margin: auto; margin-top: 2%">
															<div class="col-md-12">
																<div class="col-sm-3">
																</div>

																<div class="btn-group col-sm-6" style="margin-left: 16%">
																	<button type="submit" class="btn btn-primary btn-block" style= "width:40%">
																		Merge
																	</button>
																</div>


																<div class="col-sm-1">
																</div>


															</div>
														</div>

													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</form>

										</div>
									</div>
								</div>
							</td>


								@if(session('reserve'))
									<form method="post" action="{{ url('/ratequery/addcustomer') }}">
										<input type="hidden" name="type" value="individual">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="cus_id" value="{{ $ind -> cus_id }}">
										<input type="hidden" name="cus_name" value="{{ $ind -> fname }}">
										<button class="btn btn-primary" type="submit">Add</button>
									</form>
								@endif
						</tr>

						@endforeach

						</tbody>
					</table>

				</div>



				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>

						<div class="col-sm-5">

						</div>



						<div class="col-sm-1">
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