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

			<form class="form-horizontal" method="post" action="{{ url('/guest_profile/member_list/create') }}">



				<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
								Create New Member Profile
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

				<div class="col-md-12">
					<br><br><br>
					<div class="col-md-6">

				<div class="row" style="margin-top: 5%">
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="customer_id" class="col-sm-4" style="font-size: larger" >
							Customer ID
						</label>

						<div class="col-sm-5">

							<select class="form-control"  name="customer_id" >
								@foreach($g_id as $gid)
									<option value="{{$gid->cus_id}}"> {{$gid->cus_id}} </option>
								@endforeach
							</select>

						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group col-md-12">

						<div class="col-sm-1">
						</div>


						<label for="first_name" class="col-sm-4" style="font-size: larger" >
							First Name
						</label>

						<div class="col-sm-5">
							<input type="text" name="first_name" class="form-control" id="first_name"value="{{ old('first_name')}}">
							@if ($errors->has('first_name')) <p class="alert-danger">{{ $errors->first('first_name') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group col-md-12">

						<div class="col-sm-1">
						</div>


						<label for="last_name" class="col-sm-4" style="font-size: larger">
							Last Name
						</label>

						<div class="col-sm-5">
							<input type="text" name="last_name" class="form-control" id="last_name"value="{{ old('last_name')}}">
							@if ($errors->has('last_name')) <p class="alert-danger">{{ $errors->first('last_name') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6" style="margin-top: 0.5%">
				<br>
				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="telephone_number" class="col-sm-4" style="font-size: larger">
							Tel No.
						</label>

						<div class="col-sm-5">
							<input type="text" name="telephone_number" class="form-control" id="tel_no"value="{{ old('telephone_number')}}">
							@if ($errors->has('telephone_number')) <p class="alert-danger">{{ $errors->first('telephone_number') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">

						<div class="col-sm-1">
						</div>


						<label for="nic_passport" class="col-sm-4" style="font-size: larger">
							NIC
						</label>

						<div class="col-sm-5">
							<input type="text" name="nic_passport" class="form-control" id="nic"value="{{ old('nic_passport')}}">
							@if ($errors->has('nic_passport')) <p class="alert-danger">{{ $errors->first('nic_passport') }}</p>@else @endif
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

							<div class="col-sm-2" style="margin-top: 5%">
								<button type="submit" name="addbtn" value="addmember"  class=" btn btn-primary " style="width: 55%">
									Add
								</button>


							</div>

							<div class="col-sm-2"style="margin-top: 5%">
								<div class="btn-group"> <a class="btn btn-warning "   href={!! url('/guest_profile/member_list') !!}  >Cancel</a></div>
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