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
			  $('#order_table').DataTable();
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
		<div class="row">

				<div class="row">

					<div class="col-md-12">
							<div>
							<h3 class="text-muted text-center">
								Customer Profile Management System
							</h3>
								<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">

								@if(session('reserve'))
									<div class="btn-group" align="right">
										<a class="btn btn-default  btn-block" href="{!! url('/registerind') !!}" style="width:100%">Back
										</a>
									</div>
								@endif

							<br>
							<hr>
							<h4 class="text-muted text-center">
								Guest Profile Management - Member List
							</h4>
								<br>

							</div>

					</div>

				</div>

				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
							<li>
								<a href="{{ url('guest_profile/individual_list') }}">Individual</a>
							</li>
							<li>
								<a href="{{ url('/guest_profile/company_list') }}">Company</a>
							</li>
							<li>
								<a href="{{ url('/guest_profile/travel_agent_list') }}">Travel Agent</a>
							</li>
							<li class="active">
								<a href="#">Member</a>
							</li>

						</ul>

					</div>

				</div>




				<div class="row" style="margin-top: 5%">
					<table  id="order_table" class="table table-hover table-bordered table-condensed">



						<thead>
						<tr class="success">
							<th>
								MID
							</th>


							<th>
								First Name
							</th>
							<th>
								Last Name
							</th>


							<th >
								NIC
							</th>

							<th>
								Contact Number
							</th>

						</tr>
						</thead>
						<tbody>
						@foreach($members as $member)
							<tr class="active">
								<td>
									{{$member -> mem_id}}
								</td>
								<td>
									{{$member -> fname}}

								</td>
								<td>
									{{$member -> lname}}
								</td>

								<td>
									{{$member -> NIC_Passport}}
								</td>

								<td>
									{{$member -> contact_no}}
								</td>

							</tr>
						@endforeach

						</tbody>
					</table>

				</div>



			<div class="row" style="margin-top: 2%">
				<div class="form-group col-md-12" >

					<div class="col-sm-3"  >
					</div>

					<div class="col-sm-3">
						<div class="btn-group"> <a class="btn btn-primary "  href={!! url('/guest_profile/member_list/create') !!} >Create New Member Profile</a></div>
					</div>

					<div class="col-sm-3">
						<div class="btn-group"> <a class="btn btn-warning " @if(!session('reserve')) href="{!! url('/guest_profile') !!}"@else href="{!! url('/registerind') !!}" @endif style="width: 350%">Close</a></div>
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