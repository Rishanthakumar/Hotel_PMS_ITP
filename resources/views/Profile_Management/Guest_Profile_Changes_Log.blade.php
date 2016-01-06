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
			  $('#log_table').DataTable();
		  } );

	  </script>

  </head>
  <body>

    <div class="container">
		<div class="row">

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
								Log of Changes
							</h4>


									<div class="btn-group btn-block " style="margin-top: -5%"> <a class="btn btn-default pull-right"  href={!! url('/guest_profile') !!} >Home</a></div>

							</div>

					</div>



				</div>




				<div class="row" style="margin-top: 3%">
					<table id="log_table" class="table table-hover table-condensed table-bordered">
						<thead>
						<tr class="success">
							<th>
								User
							</th>
							<th>
								Date & Time
							</th>
							<th>
								Action Type
							</th>
							<th>
								Description
							</th>

						</tr>
						</thead>
						<tbody>
						@foreach( $changes_log as $change)
							<tr class="active">
								<td>{{$change->user}}</td>
								<td>{{$change->ch_time}}</td>
								<td>{{$change->action_type}}</td>
								<td>{{$change->description}}</td>
							</tr>
						@endforeach

						</tbody>
					</table>
				</div>

				<br>
				<br>

			<div class="row" style="margin-top: 1%;margin-left: 5%">
				<div class="form-group col-md-12" >

					<div class="col-sm-4">
					</div>




					<div class="col-sm-4">
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