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

	  <script>
		  window.onload = function() {
			  disablefield;
			  document.getElementById('agent').onchange = disablefield;
			  document.getElementById('company').onchange = disablefield;
			  document.getElementById('ind').onchange = disablefield;

		  }

		  function disablefield()
		  {
			  if ( document.getElementById('agent').checked == true ){
				  document.getElementById('cpval').disabled = true;
				  document.getElementById('agval').disabled = false;
				  document.getElementById('indval').disabled = true;
			  }
			  else if (document.getElementById('company').checked == true ){
				  document.getElementById('agval').disabled = true;
				  document.getElementById('cpval').disabled = false;
				  document.getElementById('indval').disabled = true;
			  }
			  else if ( document.getElementById('ind').checked == true ){
				  document.getElementById('agval').disabled = true;
				  document.getElementById('cpval').disabled = true;
				  document.getElementById('indval').disabled = false;
			  }
		  }



	  </script>



	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	  <!-- DataTables CSS -->
	  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

	  <!-- jQuery -->

	  <!-- DataTables -->
	  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

	  <script type="text/javascript">
		  $(document).ready(function() {
			  $('#restable').DataTable();
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
									Guest Relationship
								</h4>
							</div>

					</div>
					<div class="col-sm-2">
						<div class="btn-group "> <a class="btn btn-default" style="margin-left: 680%"  href={!! url('/guest_profile') !!} >Home</a></div>
					</div>

				</div>

			{{-- Start Of Drop down Lists--}}
			<form name="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row" style="margin-top: 5%;margin-left: 25%">

				<div class="form-group col-md-12" >
				<div class="col-md-6">
				<input type="radio" value="agent" checked="checked" id="agent" name="stype" >
						<label style="font-size: larger">

							Search by Travel Agent

						</label>
					</div>

					<div class="col-md-3">

					<select class="form-control" name="agent" id="agval" style="margin-left: -95%">
							@foreach($travels as $trav )
								<option value="{{$trav->cus_id}}">{{$trav->name}}</option>
							@endforeach
					</select>
						</div>
					</div>
				<br>

				<div class="form-group col-md-12" >
					<div class="col-md-6">
				<input type="radio" value="company" id="company" name="stype">

						<label style="font-size: larger">

							Search by Company

						</label>

					</div>

				<div class="col-md-3">

					<select class="form-control" name="company" id="cpval"  style="margin-left: -95%">
							@foreach($companys as $comp )
								<option value="{{$comp->cus_id}}">{{$comp->name}}</option>
							@endforeach
					</select>
				</div>
				</div>


				<br>

				<div class="form-group col-md-12" >
					<div class="col-md-6">
				<input type="radio" value="indi" id="ind" name="stype">

						<label style="font-size: larger">
						Search by Individual
						</label>

					</div>

					<div class="col-md-3">

					<select class="form-control" name="ind" id="indval" style="margin-left: -95%">
						@foreach($individuals as $ind )
							<option value="{{$ind->cus_id}}">{{$ind->name}}</option>
						@endforeach
					</select>

					</div>
					</div>
				<br>
			</div>

				{{-- end Of Drop down Lists--}}

			<br>

			<div class="col-sm-2">
				<div class="btn-group "> <button name="btnSearch" value="true" class="btn btn-primary " style="margin-left: 250%;width: 150%"  href={!! url('/guest_profile/relationship') !!} >Search</button></div>
			</div>
			<?php if(isset($_POST['btnSearch'])){

			?>



				{{-- Start of Result Table--}}
			<table class="table table-bordered table-condensed table-hover" style="margin-top: 10%" id="restable">
				<thead>
				<tr class="success">
				<th>
					First Name [ Travel Agent / Company / Individual ]
				</th>
				<th>
					Last Name [ Travel Agent / Company / Individual ]
				</th>
				</tr>
				</thead>
				<tbody>
				@foreach($result as $res)
					<tr>
						<td>
							{{$res->fname}}
						</td>
						<td>
							 {{$res->lname}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
				{{--end of Result Table--}}
			<?php } ?>
				</form>


			<div class="row" style="margin-top: 1%">
<div class="form-group col-md-12" >

<div class="col-sm-1">
</div>

<div class="col-sm-3">

</div>

<div class="col-sm-3">

</div>





<div class="col-sm-3">
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