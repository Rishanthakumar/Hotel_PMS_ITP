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



	  <div class="row">


		  @if(session('reserve'))
			  <div class="btn-group pull-left" style="margin-left: 2%">
				  <a class="btn btn-default  btn-block" href="{!! url('/addbooking') !!}" style="width:100%">Back
				  </a>
			  </div>

		  @elseif (Session::has ('exceptionerr'))
			  <div class="alert alert-danger">

				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>Failed : </strong> {{Session::get('exceptionerr','')}}

			  </div>
		  @endif

		  <div class="col-md-11">

		  </div>
	  </div>

	  <br>


		<div class="row" style="margin-top: 1%">

		<div class="col-md-12">
			<table id="UpdateBookingTable" class="table table-bordered table-condensed table-hover" style="margin-top: 5%">
				<thead>
					<tr class="success">
						<th>
							Member ID
						</th>
						<th>
							Customer ID
						</th>
						<th>
							Guest First Name
						</th>
						<th>
							Guest Last Name
						</th>
						<th>
							Contact No.
						</th>
						<th>
							Action
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
							{{$member-> cus_id}}
						</td>
						<td>
							{{$member -> fname}}
						</td>
						<td>
							{{$member -> lname}}
						</td>
						<td>
							{{$member -> contact_no}}
						</td>

						<td>

								<form method="post" action="{{ url('/addcus') }}">

									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="guest_name" value="{{ $member-> fname }}">
									<input type="hidden" name="cus_id" value="{{ $member-> cus_id }}">
									<input type="hidden" name="mem_id" value="{{ $member-> mem_id }}">
									<input type="hidden" name="tel_no" value="{{ $member -> contact_no }}">
									<button class="btn btn-primary" type="submit" style="margin-left: 25%">Add</button>
								</form>

						</td>

	</tr>

				@endforeach
 </tbody>
</table>
</div>
</div>
</div>



</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>



  <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
	  $(document).ready(function(){
		  $('#UpdateBookingTable').DataTable();
	  });

  </script>


  </body>
</html>