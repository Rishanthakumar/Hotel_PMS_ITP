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

  </head>
  <!--<body style="background-image: url('http://localhost:8888/2.jpg');background-size: 100%";>

  <div class="container-fluid" style="margin-top: 2%">
	  <button type="submit" class="btn btn-default" style="margin-top:1%;margin-left: 95%">
		  Logout
	  </button>-->

  <body>


		<div class="col-md-12">
			<h3 class="text-muted text-center">
				Pick-up & Drop-off System
			</h3>
			<img src="{{asset('common/logo-amaya.jpg')}}" style="width: 4%;margin-top: -4%">
			<hr>




			<ul class="nav nav-pills">

				<a href="/AmayaHomePage" class="btn btn-default">Main Panel</a>

				{{--<li class="dropdown pull-right">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Receptionist<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
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


			<div class="container-fluid" style="margin-left: 5%" >
				<div class="row" style="margin-top: 7%" >
					<div class="col-md-2">
						<div class="thumbnail" style="width: 110%">
							<a  href={!! url('addbooking') !!}><img align="center" alt="Bootstrap Thumbnail First" src="{{asset('Vehicle_Reservation_Images/Add booking.png')}}">




								<div class="panel-heading" id="panel-656411">
									<div class="panel panel-default panel-body" align="center">

											<a  style="text-decoration: none" href={!! url('addbooking') !!} class="panel-title collapsed data-toggle="collapse">Add vehicle booking</a>


									</div>

								</div>
							</a>

						</div>
					</div>


					<div class="col-md-2" style="margin-left: 2%">
						<div class="thumbnail" style="width: 110%">
							<a  href={!! url('updatebooking') !!}><img align="center" style="" alt="Bootstrap Thumbnail First" src="{{asset('Vehicle_Reservation_Images/Update booking.png')}}">


								<div class="panel-heading" id="panel-769304" style="text-align: center">
									<div class="panel panel-default panel-body">

											<a  style="text-decoration: none" href={!! url('updatebooking') !!} class="panel-title collapsed data-toggle="collapse" >Update bookings</a>


									</div>
								</div>
							</a>




						</div>
					</div>

					<div class="col-md-2"style="margin-left: 2%">
						<div class="thumbnail" style="width: 110%">
							<a  href={!! url('pendingpaymenthandling') !!}><img align="center" style="" alt="Bootstrap Thumbnail First" src="{{asset('Vehicle_Reservation_Images/Finalize booking.png')}}">


								<div class="panel-heading" id="panel-980763" style="text-align: center">
									<div class="panel panel-default panel-body">

										<a  style="text-decoration: none" href={!! url('pendingpaymenthandling') !!} class="panel-title collapsed data-toggle="collapse" >Payment handling</a>


									</div>
								</div>

							</a>

						</div>
					</div>

					<div class="col-md-2" style="margin-left: 2%">
						<div class="thumbnail" style="width: 110%">
							<a  href={!! url('availablevehicles') !!}><img align="center" style="" alt="Bootstrap Thumbnail First" src="{{asset('Vehicle_Reservation_Images/Available vehicles.png')}}">


								<div class="panel-heading" id="panel-980763" style="text-align: center">
									<div class="panel panel-default panel-body">

											<a  style="text-decoration: none" href={!! url('availablevehicles') !!} class="panel-title collapsed data-toggle="collapse"  >Available vehicles</a>


									</div>
								</div>

							</a>

						</div>
					</div>


					<div class="col-md-2" style="margin-left: 2%">
						<div class="thumbnail" style="width: 110%">
							<a  href={!! url('availabledrivers') !!}><img align="center" alt="Bootstrap Thumbnail First" src="{{asset('Vehicle_Reservation_Images/Available drivers.png')}}">

								<div class="panel-heading"  id="panel-864331" style="text-align: center" >
									<div class="panel panel-default panel-body">

											<a  style="text-decoration: none" href={!! url('availabledrivers') !!} class="panel-title collapsed  data-toggle="collapse" >Available drivers</a>


									</div>
								</div>

							</a>

						</div>
					</div>
				</div>
			</div>
		</div>

		{{Session::forget('date')}}
		{{Session::forget('time')}}

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>