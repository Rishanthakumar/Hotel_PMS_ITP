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
		<div class="row" >

			<form class="form-horizontal" method="post" action="{{ url('/guest_profile/preferences') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">

					<div class="col-md-12">
							<div>
							<h3 class="text-muted text-center">
								Customer Profile Management System
							</h3>

								<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
							</div>

							<br>
							<hr>
							<h4 class="text-muted text-center">
								Preferences
							</h4>


					</div>

				</div>

				@if (Session::has ('exception'))
					<div class="alert alert-danger">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Failed : </strong> {{Session::get('exception','')}}

						@endif

					</div>


				<div class="row" style="margin-top: 5%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="member" class="col-sm-3" style="font-size: larger">
							Member ID
						</label>

						<div class="col-sm-3">
							<select class="form-control"  name="mid" value="{{ old('mid')}}">
								@foreach($g_id as $gid)
								<option value="{{$gid->mem_id}}"> {{$gid->mem_id}} </option>
								@endforeach
							</select>


						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>


				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="general_information" class="col-sm-3" style="font-size: larger">
							General Information
						</label>

						<div class="col-sm-5">
							<textarea name="general_information"  rows="3" cols="10" class="form-control" style="width: 70%" ></textarea>
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="allergy_information" class="col-sm-3" style="font-size: large">
								Allergy Information
						</label>

						<div class="col-sm-5">
							<textarea name="allergy_information" rows="3" cols="10" class="form-control" style="width: 70%"></textarea>
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="special_information" class="col-sm-3" style="font-size: large">
							Special Information
						</label>


						<div class="col-sm-5">
							<textarea name="special_information" rows="3" cols="10" class="form-control" style="width: 70%" ></textarea>
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

					<div class="row" style="margin-top: 1%">
						<div class="form-group col-md-12" >

							<div class="col-sm-4">
							</div>

							<div class="col-sm-2">
								<button type="submit" name="addPreference" value="addPreference"  class="btn btn-primary btn-block"style="width:60%">
									Ok
								</button>
							</div>

							<div class="col-sm-2">
								<div class="btn-group btn-block"> <a class="btn btn-warning btn-block" style="width: 60%"  href={!! url('guest_profile/preferences_list') !!} >Cancel</a></div>
							</div>

							<div class="col-sm-4">
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