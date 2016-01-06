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
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
		</div>
		<div class="col-md-12">
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
				<li class="active">
					<a href="#">Reservation</a>
				</li>
				<li>
					<a href="{{ url('/reports/tomorrow_arrival') }}">Tomorrow's Arrival</a>
				</li>
				<li>
					<a href="{{ url('/reports/tomorrow_departure') }}">Tomorrow's Departures</a>
				</li>
				<li>
					<a href="{{ url('/reports/turn_away') }}">Turnaways</a>
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

		<div class="row" align="center">

			<div class="col-md-12" align="center" style="font-size: larger">
				<label class="checkbox-inline"><input type="checkbox" value="">Waitlisted </label>
				<label class="checkbox-inline"><input type="checkbox" value="">Cancelled </label>
				<label class="checkbox-inline"><input type="checkbox" value="">Confirmed </label>
				<label class="checkbox-inline"><input type="checkbox" value="">Tentative </label>
				<label class="checkbox-inline"><input type="checkbox" value="">Checked-Out </label>
			</div>

		</div>


		<div class="row" style="margin-top:3%">
			<div class="container" style="margin-left: 7%">



				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-5">
							<div class="form-group" style="margin-left: 10%">


								<label class="radio-inline col-sm-1"><input  type="radio" class="form-group" name="date_type" id="chk1" value="reservation_date" ><b></b></label>


								<label for="from" class="col-sm-4" style="font-size: large">
									From
								</label>

								<div class="col-sm-6">
									<input type="date" class="form-control" id="datepicker" name="from" placeholder="Select the date" disabled/>
								</div>

							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group" style="margin-left: 10%">



								<label for="profilename" class="col-sm-4" style="font-size: large">
									To
								</label>

								<div class="col-sm-6">
									<input type="date" class="form-control" id="datepicker1" name="to" placeholder="Select the date" disabled/>
								</div>

							</div>
						</div>

					</div>
				</div>


				<div class="row">
					<br>

					<div class="col-md-12">
						<div class="col-md-5">
							<div class="form-group" style="margin-left: 10%">

								<label class="radio-inline col-sm-1"><input  type="radio" class="form-group" name="date_type" id="chk2" value="checkin_checkout"><b></b></label>

								<label for="check_in" class="col-sm-4" style="font-size: large">
									Check-In
								</label>

								<div class="col-sm-6">
									<input type="date" class="form-control" id="datepicker2" placeholder="Select the date" disabled/>
								</div>

							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group" style="margin-left: 10%">

								<label for="profilename" class="col-sm-4" style="font-size: large">
									Check-Out
								</label>

								<div class="col-sm-6">
									<input type="date" class="form-control" id="datepicker3" placeholder="Select the date" disabled/>
								</div>

							</div>
						</div>

					</div>
			</div>




			</div>

			<br>

			<div class="row">
				<div class="col-md-12">
					<div align="center">

						<button class="btn btn-primary">Generate</button>

					</div>
				</div>
			</div>
		<div class="row" style="margin-top: 3%">

			<div class="col-md-12" >



				<table class="table table-hover table-bordered" id="check_in_table">
					<thead>
					<tr>
						<th>
							Reservation Id
						</th>
						<th>
							Date
						</th>
						<th>
							Name
						</th>
						<th>
							Status
						</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr>
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr>
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr>
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
					</tbody>
				</table>
			</div>

	</div>

		<div class="row">
			<div class="col-md-12" align="center">
			<button class="btn btn-primary">Generate Report</button>
				</div>
		</div>

</div>




	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

	<!--Don't use this link! It will affect the drop downs
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		-->
	<!--Links for Time picker-->
	<script src="https://raw.githubusercontent.com/moment/moment/develop/moment.js"></script>
	<script src="https://raw.githubusercontent.com/moment/moment/master/locale/id.js"></script>
	<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

	<!--Functions of date and timepicker-->
	<script>
		$(function() {

			var datepicker = document.getElementById('datepicker');
			var datepicker1 = document.getElementById('datepicker1');
			var datepicker2 = document.getElementById('datepicker2');
			var datepicker3 = document.getElementById('datepicker3');






				$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,

			});

			$( "#datepicker1" ).datepicker({
				changeMonth: true,
				changeYear: true
			});

			$( "#datepicker2" ).datepicker({
				changeMonth: true,
				changeYear: true
			});

			$( "#datepicker3" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		});

		$(".form-group").change(function () {

			$('input[id=chk1]:checked').each(function () {

				$("#datepicker").datepicker('enable');
				$("#datepicker1").datepicker('enable');
				$("#datepicker2").datepicker('disable');
				$("#datepicker3").datepicker('disable');


			});

			$('input[id=chk2]:checked').each(function () {

				$("#datepicker2").datepicker('enable');
				$("#datepicker3").datepicker('enable');
				$("#datepicker1").datepicker('disable');
				$("#datepicker").datepicker('disable');


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