<!DOCTYPE html>
<html lang="en">
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
  <!--<body style="background-image: url('http://localhost:8888/2.jpg');background-size: 100%";>

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

			  <li>

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
					  <li>
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

			  <li class="active">

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
					  <li class="active">
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
					  </li>--}}

				  </ul>
			  </li>
{{--
			  <li class="dropdown pull-right">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Transport Supervisor<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href="#">Edit Profile</a>
					  </li>
					  <li>
						  <a href={!! url('login') !!}>Logout</a>
					  </li>
				  </ul>
			  </li>--}}
		  </ul>
	  </div>
  </div>
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
  </li>
  </ul>

	<div class="row">
		<div class="col-md-11">
			<h4 class="text-muted" style="margin-top: 2%;margin-left: 1%">
				Update Driver Legal Information
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
			<strong>Success : </strong> {{Session::get('message','')}}

		</div>

	@elseif (Session::has ('exceptionerr'))
		<div class="alert alert-danger">

			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Failed : </strong> {{Session::get('exceptionerr','')}}

		</div>

		@elseif (Session::has ('message1'))
			<div class="alert alert-success">

				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Success : </strong> {{Session::get('message1','')}}

			</div>
			@endif





		<!--	<form class="form-horizontal" role="form" style="margin-top: 5%">
				<div class="row">
					<div class="col-md-12">
						<form role="form">
							<div class="form-group">

								<label   class="col-sm-2 control-label">
									Comment
								</label>
								<div class="col-sm-2">
									<textarea class="form-control custom-control" rows="3" style="resize:none"> </textarea>
								</div>
							</div>

							<div class="form-group">

								<label   class="col-sm-2 control-label">
									Attach a file
								</label>
								</div>


							<div class="form-group">
								<input id="exampleInputFile" type="file" style="margin-top: -3%;margin-left: 18%; color:red"/>

							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">

									<button type="submit" class="btn btn-primary">
										Submit
									</button>
								</div>

							</div>

						</form>
					</div>
				</div>
				</form> -->





  <div class="col-md-12">

	  <div class="row" style="margin-top: 3%">

	  <table id="UpdateDriverLegalTable" class="table table-bordered table-condensed table-hover" style="margin-top: 5%">
		  <thead>
		  <tr class="success">

			  <th>
				  DLI ID
			  </th>
			  <th>
				 Driver ID
			  </th>
			  <th>
				 Driver Name
			  </th>
			  <th>
				  Comment
			  </th>
			  <th>
				  Attachment
			  </th>
			  <th>Action</th>
		  </tr>
		  </thead>
		  <tbody>
		  @foreach ($driver_legals as $driver_legal)
		  <tr class="active">
			  <td>
				  {{$driver_legal -> DLI_ID}}
		      </td>
			  <td>
				  {{$driver_legal -> driver_id}}
			  </td>
			  <td>
				  {{$driver_legal -> driver_name}}
			  </td>
			  <td>
				  {{$driver_legal -> comment}}
			  </td>
			  <td>
				  {{$driver_legal -> attachement}}
			  </td>

			  <td>
				  <a class="btn btn-primary btn-sm" style="margin-left: -5%" data-toggle="modal" data-target="#e{{$driver_legal -> DLI_ID}}" href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
				  <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#d{{$driver_legal -> DLI_ID}}" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>

				  <!-- Trigger the modal with a button -->


				  <!-- Modal -->
				  <div id="e{{$driver_legal -> DLI_ID}}" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						  <!-- Modal content-->
						  <div class="modal-content">
							  <div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4  style="text-align: center">Driver Legal Information ID : {{ $driver_legal -> DLI_ID }}</h4>
							  </div>
							  <div class="modal-body">
								  <form method="post" class="form-horizontal" role="form" style="margin-top: 5%" action="editdriverlegal">
									  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									  <div class="form-group">

										  <label class="col-sm-5 control-label">
											  Driver Legal Information ID
										  </label>
										  <div class="col-sm-6">
											  <input class="form-control" id="DLI_ID" name="DLI_ID" readonly value="{{$driver_legal -> DLI_ID}}" type="text">
										  </div>
									  </div>

									  <div class="form-group">

										  <label class="col-sm-5 control-label">
											  Driver ID
										  </label>
										  <div class="col-sm-6">
											  <input class="form-control" id="driver_id" name="driver_id" readonly value="{{$driver_legal -> driver_id}}" type="text">
										  </div>
									  </div>

									  <div class="form-group">

										  <label class="col-sm-5 control-label">
											  Driver Name
										  </label>
										  <div class="col-sm-6">
											  <input class="form-control" id="driver_name" name="driver_name" readonly value="{{$driver_legal -> driver_name}}" type="text">
										  </div>
									  </div>



									  <div class="form-group">

										  <label  class="col-sm-5 control-label">
											  Comment
										  </label>
										  <div class="col-sm-6">
											  <input class="form-control" id="comment" name="comment" value="{{$driver_legal -> comment}}" type="text">
											  @if ($errors->has('comment')) <p class="alert-danger">{{ $errors->first('comment') }}</p>@else @endif
										  </div>
									  </div>
									  <div class="form-group">

										  <label  class="col-sm-5 control-label">
											  Attachment
										  </label>
										  <div class="col-sm-6">
											  <input class="form-control" id="attachement" name="attachement" readonly value="{{$driver_legal -> attachement}}" type="text">
										  </div>
									  </div>

									  <div class="form-group">
										  <div class="col-sm-offset-5 col-sm-10">

											  <button type="submit" class="btn btn-primary">
												  Edit
											  </button>

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

				  <div id="d{{$driver_legal -> DLI_ID}}" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						  <!-- Modal content-->
						  <div class="modal-content">
							  <div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-header" style="text-align: center">Remove Driver Legal Information : {{ $driver_legal -> DLI_ID }}</h4>
							  </div>
							  <div class="modal-body">
								  <form method="post" class="form-horizontal" role="form" style="margin-top: 5%" action={!! url('removedriverlegal') !!}>
									  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									  <input type="hidden" name="DLI_ID" value="{{ $driver_legal -> DLI_ID}}">
									  <div class="form-group">

										  <div class="col-md-12">

											  <div class="form-group">

												  <div id="deleteWarning" class="alert alert-danger">
													  <strong style="margin-left: 15%">Warning : </strong>You are about to delete Driver Legal Information!
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



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>



<script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#UpdateDriverLegalTable').DataTable();
	});
</script>

  </body>
</html>