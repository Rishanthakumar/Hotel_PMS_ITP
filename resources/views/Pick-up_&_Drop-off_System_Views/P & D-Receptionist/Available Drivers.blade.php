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

				<li>
					<a href={!! url('pendingpaymenthandling') !!}>Payment handling</a>
				</li>

				<li>
					<a href={!! url('viewbookings') !!}>View vehicle bookings</a>
				</li>

				<li>
					<a href={!! url('availablevehicles') !!}>View available vehicles</a>
				</li>
				<li class="active">
					<a href={!! url('availabledrivers') !!}>View available drivers</a>
				</li>

				{{--<li class="dropdown pull-right">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Receptionist<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Edit Profile</a>
						</li>
						<li>
							<a href={!! url('login') !!}>Logout</a>
						</li>--}}
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


				<div class="col-md-1">
					<br>
					<a class="btn btn-default pull-right " style="margin-left: 82%" href={!! url('welcomereceptionist') !!} style="width:50%">Home
					</a>

				</div>

				<div class="col-md-11">

				</div>

			</div>


					<div class="row" style="margin-top: 5%">
		<div class="col-md-12">

			<table id="AvailableDriversTable" class="table table-bordered table-condensed table-hover">
				<thead>
				<tr class="success">
					<th>
						Driver ID
					</th>
					<th>
						First Name
					</th>
					<th>
						Last Name
					</th>
					<th>
						Licence No.
					</th>
					<th>
						NIC
					</th>
					<th>
						Address
					</th>
					<th>
						Tel No.
					</th>
					<th>
						Status
					</th>
				</tr>
				</thead>

				<tbody>

				@foreach ($drivers as $driver)

				<tr class="active">
					<td>
						{{$driver -> driver_id}}
					</td>
					<td>
						{{$driver -> fname}}
					</td>
					<td>
						{{$driver -> lname}}
					</td>
					<td>
						{{$driver -> licence_no}}
					</td>
					<td>
						{{$driver -> NIC}}
					</td>
					<td>
						{{$driver -> address}}
					</td>
					<td>
						{{$driver -> tel_no}}
					</td>
					<td>
						{{$driver -> status}}
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
		  $('#AvailableDriversTable').DataTable();
	  });
  </script>

  </body>
</html>