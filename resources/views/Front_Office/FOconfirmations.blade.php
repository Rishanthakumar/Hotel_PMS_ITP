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

	  <!--Links for dropdowns-->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


	  <!-- These links the date picker-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">

	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">


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
				Confirmations
			</h4>


		</div>
		<div class="col-md-3" align="left">
			<div class="btn-group">
				<a class="btn btn-default  btn-block" href={!! url('/FO_mainpage') !!} style="width:100%">Home
				</a>
			</div>
		</div>
	</div>

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


	<div class="row" style="margin-top: 5%">
		<div class="col-md-12" >

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
							Check-in
						</th>
						<th>
							Check-out
						</th>
						<th>
							email
						</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tbody>
				@foreach($reser as $reservdetail)
					<tr>
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
							{{ $reservdetail->email }}
						</td>
						<td>
							<form method="post" action="{{ url('/confirmations/sendmail') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="email" value="{{ $reservdetail->email }}">
								<input type="hidden" name="name" value="{{ $reservdetail->name }}">
								<input type="hidden" name="check_in" value="{{ $reservdetail->check_in }}">
								<input type="hidden" name="res_id" value="{{ $reservdetail->res_id }}">

							<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#edittable{{ $reservdetail->res_id }}" style="width: 100%" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
								</form>
						</td>
					</tr>
				@endforeach

				</tbody>
			</table>
			<script>
				$(document).ready( function () {
					$('#table_id').DataTable();
				} );
			</script>
		</div>
	</div>

		<div class="row" style="margin: auto;margin-top: 3%;margin-right: 5%;margin-left: 5%">
			<div class="col-md-12">

				<div class="btn-group col-sm-2">

				</div>

				<div class="col-sm-1">
				</div>

				<div class="btn-group col-sm-2">

				</div>

				<div class="col-sm-1">
				</div>


				<div class="btn-group col-sm-2">

				</div>


				<div class="col-sm-1">
				</div>

				<div class="btn-group col-sm-2" style="margin-bottom: 5%">

				</div>






			</div>

		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

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
		$(function () {
			$('#timepicker').datetimepicker({
				format: 'LT'
			});
		});

	</script>
	<script>
		$(".§dropdown-menu li a").click(function(){
			var selText = $(this).text();
			$(this).parents('.btn-group1').find('.dropdown-toggle1').html(selText+' <span class="caret"></span>');
		});

	</script>

  </body>
</html>