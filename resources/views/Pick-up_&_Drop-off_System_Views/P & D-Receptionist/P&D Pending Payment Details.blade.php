<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts & Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

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

  <div class="col-md-12">
	  <h3 class="text-muted text-center">
		  Pick-up & Drop-off System
	  </h3>
	  <img src="{{asset('common/logo-amaya.jpg')}}" style="width: 4%;margin-top: -4%">
	  <hr>

	  <ul class="nav nav-tabs">
		  <li>

			  <a href={!! url('addbooking') !!}>Add vehicle booking</a>
		  </li>
		  {{--<li>
			  <a href={!! url('finalizebooking') !!}>Finalize vehicle bookings</a>
		  </li>--}}


		  <li>
			  <a href={!! url('updatebooking') !!}>Update vehicle bookings</a>
		  </li>

		  <li class="active">
			  <a href={!! url('pendingpaymenthandling') !!}>Payment handling</a>
		  </li>

		  <li>
			  <a href={!! url('viewbookings') !!}>View vehicle bookings</a>
		  </li>

		  <li>
			  <a href={!! url('availablevehicles') !!}>View available vehicles</a>
		  </li>
		  <li>
			  <a href={!! url('availabledrivers') !!}>View available drivers</a>
		  </li>

		  {{--<li class="dropdown pull-right">
			  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Receptionist<strong class="caret"></strong></a>
			  <ul class="dropdown-menu">

				  <li>
					  <a href="{!! url('login') !!}">Logout</a>
				  </li>

					</ul>
					</li>--}}
					</ul>
	  {{--<div class="row">


		  <div class="col-md-1">
			  <br>
			  <a class="btn btn-default pull-right " style="margin-left: 82%" href={!! url('welcomereceptionist') !!} style="width:50%">Home
			  </a>

		  </div>



	  </div>--}}
	  <div class="row" style="margin-top: 5%">
		  <div class="col-md-1"></div>
		  <div class="col-md-12">

			  <ul class="nav nav-tabs">
				  <li role="presentation" class="active"><a href="/pendingpaymenthandling">Pending Payment Details</a></li>
				  <li role="presentation"><a href="/creditpaymenthandling" style="color:grey">Credit Payment Details</a></li>
				  <li role="presentation"><a href="/finalizedpaymenthandling"style="color:grey">Finalized Payment Details</a></li>
				  <li class="btn pull-right" style="margin-top: -1.5% "><a  href="/welcomereceptionist" class="btn btn-default">Home</a></li>

			  </ul>
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
	  @endif



					<div class="row" style="margin-top: 5%">
		<div class="col-md-12">

			<table id="PendingPaymentTable" class="table table-bordered table-condensed table-hover ">
				<thead>
				<tr class="success">
					<th>
						Payment ID
					</th>
					<th>
						VR-ID
					</th>
					<th>
						Reservation ID
					</th>
					<th>
						Member ID
					</th>
					<th>
						Package
					</th>
					<th>
						Price
					</th>
					<th>
						Additional
					</th>
					<th>
						Total
					</th>
					<th>
						Status
					</th>
					<th>
						Action 1
					</th>
					<th>
						Action 2
					</th>

				</tr>
				</thead>
				<tbody>
				@foreach ($pending_pd_payments as $pending_pd_payment)
					<tr class="active">
						<td>
							{{$pending_pd_payment -> pp_id}}

						</td>
						<td>
							{{$pending_pd_payment -> vr_id}}
						</td>
						<td>
							{{$pending_pd_payment -> res_id}}
						</td>
						<td>
							{{$pending_pd_payment -> mem_id}}
						</td>
						<td>
							{{$pending_pd_payment -> package}}
						</td>
						<td>
							{{$pending_pd_payment -> package_price}}
						</td>
						<td>
							{{$pending_pd_payment -> additional_charge}}
						</td>
						<td>
							{{$pending_pd_payment -> total_amount}}
						</td>


						<td>
							{{$pending_pd_payment -> status}}
						</td>

						<td>
							<form method="post" action="{{ url('/paymentstatuschange') }}">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="pp_id" value="{{ $pending_pd_payment-> pp_id }}">
							<button class="btn btn-warning btn-xs" type="submit" style="margin-left: -2%;width: 45%" name="btn" value="credit">Credit</button>
							<button class="btn btn-primary btn-xs" type="submit" name="btn" style="width: 52%" value="finalize">Finalize</button>


							</form>
						</td>
						<td>

							<button style="width: 105% " class="btn btn-success btn-xs" type="submit" name="btn" value="finalize" onclick="location.href='/printpdbill/{{ $pending_pd_payment-> pp_id }}';">Generate Invoice</button>


						</td>

					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

  </div>

  {{Session::forget('date')}}
  {{Session::forget('time')}}


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>



  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
	  $(document).ready(function(){
		  $('#PendingPaymentTable').DataTable();
	  });
  </script>

  </body>
</html>