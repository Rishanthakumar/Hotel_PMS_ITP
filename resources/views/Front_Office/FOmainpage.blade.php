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



  </head>
  <body>

    <div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

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
				<div class="col-md-3">
				</div>
					<div class="col-md-12">
						<h3 class="text-center text-muted">
							Front Office Management System
						</h3>
						<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
						<hr>



					</div>


						<div class="col-md-3" align="left">
							<div class="btn-group">
								<a class="btn btn-default  btn-block" href="{!! url('/FO_mainpage') !!}" style="width:100%">Main Panel
								</a>
							</div>
						</div>



			</div>
			<div class="row" style="margin-top: 5%;margin-left: 4%">
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img align="center" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/reservation.png') }}">

							<div class="btn-group btn-block"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#" style="width: 100%">Reservations<span class="caret"></span></a>
								<ul class="dropdown-menu" style="width: 100%">
									<li><a href={!! url('/ratequery/ratedetail') !!}>New Reservation</a></li>
									<li class="divider"></li>
									<li><a href={!! url('updateres') !!}>Update Reservation</a></li>
									<li class="divider"></li>
									<li><a href={!! url('waitlist') !!}>Waitlist</a></li>
									<li class="divider"></li>
									<li><a href="#">Floor Plan</a></li>
									<li class="divider"></li>
									<li><a href={!! url('confirmations')  !!}>Confirmations</a></li>
								</ul>
							</div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%"><img align="ceneter" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/check-in.png') }}">

						<div class="btn-group btn-block"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#" style="width: 100%">Check-In/Check-Out<span class="caret"></span></a>
							<ul class="dropdown-menu" style="width: 100%">
								<li><a href={!! url('checkin') !!}>Check-In</a></li>
								<li class="divider"></li>
								<li><a href={!! url('temp_check_out') !!}>Temporary Check-Out/Check-In</a></li>
								<li class="divider"></li>
								<li><a href='/checkOut'>Check Out</a></li>
								<li class="divider"></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img align="ceneter" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/payments.png') }}">

						<div class="btn-group btn-block"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#" style="width: 100%">Cashiering<span class="caret"></span></a>
							<ul class="dropdown-menu" style="width: 100%">
								<li><a href="/payments">Folio Management</a></li>
								<li class="divider"></li>
								<li><a href="/currencyConvert">Currency Exchange</a></li>
								<li class="divider"></li>


							</ul>
						</div>

					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 3%;margin-left: 4%">
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img align="ceneter" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/reports.png') }}">

							<div class="btn-group btn-block"> <a class="btn btn-default "  href="{{ url('/reports/tomorrow_arrival')}}" style="width: 100%">Reports</a></div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
					<img align="center" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/rates.png') }}">

							<div class="btn-group btn-block"> <a class="btn btn-default "  href={!! url('/ratequery/ratequerydetailonly') !!} style="width:100%">Rates</a></div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img align="center" style="" alt="Bootstrap Thumbnail First" src="{{ asset('FO_images/profile.png') }}">

							<div class="btn-group btn-block"> <a class="btn btn-default"  href="{!! url('/guest_profile') !!}" style="width: 100%">Profiles</a></div>

					</div>
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