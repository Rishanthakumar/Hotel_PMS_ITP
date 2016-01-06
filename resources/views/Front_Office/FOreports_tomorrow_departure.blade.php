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
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
	<div class="row">
		<div class="col-md-3">
		</div><div class="col-md-12">
			<h3 class="text-center text-muted">
				Front Office Management System
			</h3>
			<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
			<hr>
			<h4 class="text-center text-muted">
				Reports
			</h4>


		</div>

	</div>

	<div class="row" style="margin-top: 2%">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				{{--<li>
					<a href={!! url('/reports/reservations') !!}>Reservation</a>
				</li>--}}
				<li>
					<a href="{{ url('/reports/tomorrow_arrival') }}">Tomorrow's Arrival</a>
				</li>
				<li class="active">
					<a href="#">Tomorrow's Departures</a>
				</li>
				{{--<li>
					<a href="{{ url('/reports/turn_away') }}">Turnaways</a>
				</li>--}}
				<li>
					<a href="{{ url('/reports/in_house') }}">In House Guests</a>
				</li>

			</ul>

		</div>

	</div>


		<div class="row" style="margin-top: 3%">
			<div class="col-md-3" align="left">
				<div class="btn-group">
					<a class="btn btn-default  btn-block" href={!! url('/FO_mainpage') !!} style="width:100%">Home
					</a>
				</div>
			</div>
		</div>


		<div class="row" style="margin-top: 3%">

			<div class="col-md-12" >



				<table class="table table-hover table-bordered" id="table_id1">
					<thead class="alert-success">
					<tr>
						<th>
							Reservation id
						</th>
						<th>
							Customer name
						</th>
						<th>
							Customer type
						</th>
						<th>
							Room type
						</th>
						<th>
							No. of rooms
						</th>
						<th>
							Pax
						</th>

					</tr>
					</thead>
					<tbody>

					@foreach($reser as $reserve)
						<tr>
							<td>
								{{ $reserve->res_id }}
							</td>
							<td>
								{{ $reserve->name }}
							</td>
							<td>
								{{ $reserve->type }}
							</td>
							<td>
								{!!  $array2[$reserve->res_id]['room_types'] !!}
							</td>
							<td>
								{!!  $array2[$reserve->res_id]['room_count'] !!}
							</td>

							<td>
								{{ $reserve->adults + $reserve->children }}
							</td>

						</tr>
					@endforeach

					</tbody>
				</table>
			</div>

	</div>

		<div class="row">
			<div class="col-md-12" align="center">
				<a class="btn btn-primary" href="{!! url('/pdf_generate_dep') !!} " @if($reser == null && $array2 == null) disabled @endif>Generate Report</a>
			</div>
		</div>
</div>


	<script>

		$(document).ready(function() {
			$('#table_id1').dataTable( {
				"bStateSave": true
			} );
		} );


</script>




  </body>
</html>