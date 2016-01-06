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
								Create New Travel Agent Profile
							</h4>
							</div>

					</div>


				</div>

			@if (Session::has ('exception'))
				<div class="alert alert-danger">

					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Failed : </strong> {{Session::get('exception','')}}

					@endif

				</div>


			<form class="form-horizontal" method="post" action="{{ url('/guest_profile/travel_agent_list/create') }}">



				<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="col-md-12">

			<div class="col-md-6">
				<br>
				<div class="row" style="margin-top: 5%">

					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="name" class="col-sm-5" style="font-size: larger">
							Name
						</label>


						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}">
							@if ($errors->has('name')) <p class="alert-danger">{{ $errors->first('name') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>


				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="address" class="col-sm-5" style="font-size: large">
							Line No.
						</label>
						<div class="col-sm-5">
							<input type="text"name="address" class="form-control" id="address"value="{{ old('address')}}">
							@if ($errors->has('address')) <p class="alert-danger">{{ $errors->first('address') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="address" class="col-sm-5" style="font-size: large">
							Line 1
						</label>
						<div class="col-sm-5">
							<input type="text"name="lane1" class="form-control" id="address"value="{{ old('address')}}">
							@if ($errors->has('lane1')) <p class="alert-danger">{{ $errors->first('lane1') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="address" class="col-sm-5" style="font-size: large">
							Line 2
						</label>
						<div class="col-sm-5">
							<input type="text"name="lane2" class="form-control" id="address"value="{{ old('lane2')}}">
							@if ($errors->has('lane2')) <p class="alert-danger">{{ $errors->first('lane2') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				</div>

			<br>
			<br>

			<div class="col-md-6">
				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="address" class="col-sm-5" style="font-size: large">
							City
						</label>
						<div class="col-sm-5">
							<input type="text"name="city" class="form-control" id="address"value="{{ old('city')}}">
							@if ($errors->has('city')) <p class="alert-danger">{{ $errors->first('city') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="telephone_number" class="col-sm-5" style="font-size: large">
							Telephone Number
						</label>

						<div class="col-sm-5">
							<input type="text" name="telephone_number" class="form-control" id="tel_no"value="{{ old('telephone_number')}}">
							@if ($errors->has('telephone_number')) <p class="alert-danger">{{ $errors->first('telephone_number') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="email" class="col-sm-5" style="font-size: larger">
							E-mail
						</label>


						<div class="col-sm-5">
							<input type="text" name="email" class="form-control" id="email"value="{{ old('email')}}">
							@if ($errors->has('email')) <p class="alert-danger">{{ $errors->first('email') }}</p>@else @endif
						</div>
						<div class="col-sm-1">
						</div>
					</div>
				</div>
			</div>
		</div>

				<div class="row" style="margin-top: 1%;margin-left: 10%">
					<div class="form-group col-md-12" >

						<div class="col-sm-4">
						</div>

						<div class="col-sm-2"style="margin-top: 3%">
							<button type="submit" name="addbtn" value="addmember"  class=" btn btn-primary " style="width: 55%">
								Add
							</button>


						</div>

						<div class="col-sm-2"style="margin-top: 3%">
							<div class="btn-group"> <a class="btn btn-warning "  href={!! url('/guest_profile/travel_agent_list') !!}  >Cancel</a></div>
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