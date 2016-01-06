<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
			$('#membertab').DataTable();
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
						Preference List
					</h4>
				</div>

		</div>




			<form name="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row" style="margin-top: 5%;margin-left: 25%">


					<br>

					<div class="form-group col-md-12" style="margin-top: 5%" >
						<div class="col-md-6" >


							<label style="font-size: larger">

								Search by Reservation ID:

							</label>

						</div>

						<div class="col-md-3">

							<select class="form-control" name="reservation" id="cpval"  style="margin-left: -95%">
								@foreach($rid as $r_id)
									<option value="{{$r_id->res_id}}"> {{$r_id->res_id}} </option>
									@endforeach
							</select>

						</div>

					</div>
					</div>
					<br>


				<div class="form-group col-md-12" style="margin-top: 3%">
					<div class="col-md-6">
						<div class="btn-group "> <button name="btnSearch" value="true" class="btn btn-primary " style="margin-left: 680%;width: 150%"  href={!! url('guest_profile/preferences_list') !!} >Search</button></div>
					</div>
					</div>
				<?php
				if(isset($_POST['btnSearch'])){	?>
				<div class="form-group col-md-12" >
					<div class="col-md-8" style="margin-left: 15%">


							<table  id="membertab" class="table table-hover table-bordered table-condensed">


								<thead>
								<tr class="success">
									<th>
										Member ID
									</th>

									<th>
										Member Name
									</th>
									<th>
										General Information
									</th>

									<th>
										Allergy Information
									</th>

									<th>
										Special Information
									</th>

								</tr>
								</thead>
								<tbody>
								@foreach($member as $mem)
									@foreach($preference as $pre)
								<tr class="active">
									<td>
										{{$mem->mem_id}}
									</td>
								<td>
									{{$mem->fname}} {{$mem->lname}}
								</td>
									<td>
										{{$pre->general_preferences}}
									</td>
									<td>
										{{$pre->alergy_details}}
									</td>
									<td>
										{{$pre->special_requirements}}
									</td>
								</tr>
										@endforeach
								@endforeach
								</tbody>
								</table>


					</div>
				</div>
				<?php
				}

				?>









				<div class="row" style="margin-top: 2%">
				<div class="form-group col-md-12" >

					<div class="col-sm-3"  >
					</div>

					<div class="col-sm-3" style="margin-top: 5%">
						<div class="btn-group"> <a class="btn btn-primary "  href={!! url('/guest_profile/preferences') !!} >Create New Preference</a></div>
					</div>

					<div class="col-sm-3"style="margin-top: 5%">
						<div class="btn-group"> <a class="btn btn-warning " @if(!session('reserve')) href="{!! url('/guest_profile') !!}"@else href="{!! url('/registerind') !!}" @endif style="width: 300%;margin-left: 25%">Close</a></div>
					</div>

					<div class="col-sm-3" >
					</div>
				</div>
			</div>

			</form>

	</div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>