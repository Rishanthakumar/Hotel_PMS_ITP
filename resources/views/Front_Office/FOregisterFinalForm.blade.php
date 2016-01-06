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
    <link href="" rel="stylesheet">

	  <!--Links for dropdowns-->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


	  <!-- These links the date picker-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">

	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <link href="css/bootstrap.min.css" rel="stylesheet">


	  <script src={{asset('jquery/FOjquerysession.js')}}></script>
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-12">
				<h3 class="text-center text-muted">
					Front Office Management System
				</h3>
				<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
				<hr>
				<h4 class="text-center text-muted">
					Reservation Registration
				</h4>


			</div>
			<div class="col-md-3">
			</div>
		</div>

		<form method="POST"  class="form-horizontal" role="form" action={!! url('reservations') !!} ><input type="hidden" name="_token" value="{{ csrf_token() }}">

			{{--1st row--}}
		<div class="row">

			{{--1 st  row 1st--}}
			<div class="col-md-12">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
					<hr>
					<h4 class="text-center text-info">
						Guest Details
					</h4>
					<hr>
				</div>
			</div>

			{{--1st row 2nd--}}
			<div class="col-md-12">

				<div class="col-sm-1">
				</div>

				<div class="col-sm-2">
					<label for="customer_type" style="font-size: large">
						Customer Type
					</label>
				</div>

				<div class="col-sm-2">

					<input type="text" class="form-control" id="customer_type" name="customer_type" value="{{ session('customer_type') }}" readonly >
					{{--<select class="form-control"  name="customer_type" id="customer_type"  value="{{ old('customer_type') }}">
						--}}{{--@if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif--}}{{--
						<option value="Select">Select</option>
						<option value="FIT"@if( (old('customer_type')=="FIT" ) || (session('customer_type')=="FIT" )  ) selected="selected"@endif>FIT</option>
						<option value="CMP" @if( (old('customer_type')=="CMP" ) || (session('customer_type')=="CMP" ) ) selected="selected"@endif>CMP</option>
						<option value="TRA" @if(session('customer_type') == "TRA"|| (old('customer_type')=="TRA" ) ) selected="selected"@endif>TRA</option>
					</select>--}}
					@if ($errors->has('customer_type')) <p class="alert-danger">{{ $errors->first('customer_type') }}</p>@else<br><br>@endif

				</div>

				<div class="col-sm-1">
				</div>

				<div class="col-sm-1">

					<label for="name" style="font-size: large;">
						Name
					</label>

				</div>

				<div class="col-sm-2">
					<input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ session('customer_name') }}" readonly >
					<input type="hidden" class="form-control" id="cutomer_id" name="customer_id" value="{{ session('cus_id') }}">
					@if ($errors->has('customer_name')) <p class="alert-danger">{{ $errors->first('customer_name') }}</p>@else <br>@endif
				</div>


				<div class="col-sm-2">

					<div class="btn-group btn-block" style="width: 100%">
						<a class="btn btn-default"   id="profile" @if(session('customer_type')=='FIT')href="{!! url('/guest_profile/individual_list') !!}" @elseif(session('customer_type')=='TRA')href="{!! url('/guest_profile/travel_agent_list') !!}" @elseif(session('customer_type')=='CMP')href="{!! url('/guest_profile/company_list') !!}" @else href="#" @endif style="width:100%">Profile</a>
					</div>
				</div>


				<div class="col-sm-1">
				</div>
			</div>


		</div>


		{{--2nd row--}}
		<div class="row">

			{{--2nd row 1st--}}
			<div class="col-md-12">

				<div class="col-sm-3">
				</div>

				<div class="col-sm-6">
					<hr>
					<h4 class="text-center text-info">
						Reservation Details
					</h4>
					<hr>
				</div>

				<div class="col-sm-3">
				</div>

			</div>

			{{--2nd row 2nd--}}

			<div class="col-md-12">

				<div class="col-sm-1">
				</div>

				<div class="col-sm-2">
					<label for="arrival"style="font-size:large">
						Check-in
					</label>
				</div>

				<div class="col-sm-3">
					<input type="text" style="width: 62%" type="text" class="form-control" id="arrival_date" name="arrival_date" @if(session('arrival_date'))value="{{ session('arrival_date') }}" @else value="{{ old('arrival') }}" @endif readonly/>
					@if ($errors->has('arrival')) <p class="alert-danger">{{ $errors->first('arrival') }}</p>@else<br><br>@endif
				</div>

				<div class="col-sm-2">
					<label for=""  style="font-size: large">
						Check-out
					</label>

				</div>

				<div class="col-sm-3">
					<input type="text" style="margin-left:-35%;width: 62%;" type="text" class="form-control" id="departure_date" name="departure_date" @if(session('departure_date')) value="{{ session('departure_date') }}" @else value="{{ old('departure') }}" @endif readonly/>
					@if ($errors->has('departure')) <p class="alert-danger">{{ $errors->first('departure') }}</p>@else<br><br>@endif
				</div>

				<div class="col-sm-1">
				</div>

			</div>

			{{--2nd row 3rd --}}

			<div class="col-md-12" style="margin-top: 2%;margin-left: -4%">

				<div class="col-sm-2">
				</div>

				<div class="col-sm-1">
					<label for="adults">
						Adults
					</label>
				</div>

				<div class="col-sm-1">
					<input type="text" class="form-control"  name="adults" id="adults" readonly @if(session('adults')) value="{{ session('adults') }}" @else value="{{ old('adults') }}" @endif />
					@if ($errors->has('adults')) <p class="alert-danger">{{ $errors->first('adults') }}</p>@else <br><br>@endif
				</div>

				<div class="col-sm-1">
					<label for="children">
						Children
					</label>

				</div>

				<div class="col-sm-1">
					<input type="text" class="form-control"  name="children" id="children" readonly @if(session('children')) value="{{ session('children') }}" @else value="{{ old('children') }}" @endif />
				@if ($errors->has('children')) <p class="alert-danger">{{ $errors->first('children') }}</p>@else<br><br>@endif
				</div>

				<div class="col-sm-1">
					<label for="no_of_rooms">
						No.of Rooms
					</label>
				</div>

				<div class="col-sm-1">
					<input type="text" class="form-control"  name="ono_of_rooms" id="ono_of_rooms" readonly @if(session('ono_of_rooms')) value="{{ session('ono_of_rooms') }}" @else value="{{ old('ono_of_rooms') }}" @endif />
					@if ($errors->has('ono_of_rooms')) <p class="alert-danger">{{ $errors->first('ono_of_rooms') }}</p>@else <br> @endif
				</div>

				<div class="col-sm-1">
					<label for="nights">
						Nights
					</label>
				</div>

				<div class="col-sm-1">
					<input type="text" class="form-control" name="nights" id="nights" readonly @if(session('nights')) value="{{ session('nights') }}" @else value="{{ old('nights') }}"@endif />
					@if ($errors->has('nights')) <p class="alert-danger">{{ $errors->first('nights') }}</p>@else <br> @endif
				</div>

				<div class="col-sm-2">
				</div>



			</div>
		</div>


		{{--3rd row--}}
		<div class="row">



			{{--3rd row 2--}}
			<div class="col-md-12">

				<div class="col-sm-3">
				</div>

				<div class="col-sm-6">

				</div>

				<div class="col-sm-3">
				</div>
			</div>

			<div class="col-md-12">

				<div class="col-sm-2">
				</div>

				<div class="col-sm-2">
				</div>
				<div class="col-sm-4">
					<label  style="margin-left: -4%" for="arrival">
						Any Additional Request(s)/Comment(s)
					</label>

					<div class="form-group">
						<textarea class="form-control" rows="3" id="additional" name="additional"></textarea>
					</div>
				</div>


			</div>

		</div>


			{{--4th row--}}
		<div class="row" style="margin-bottom: 2%">

			<div class="col-md-12">


				<div class="col-sm-5">
				</div>

				<div class="btn-group col-sm-1">
					<a class="btn btn-warning  "  href="{!! url('/FO_mainpage') !!}">Cancel
					</a>
				</div>



				<div class="col-sm-1">
				<button type="submit" class="btn btn-primary" style="width: 115%">
					Reserve
				</button>
				</div>

				<div class="col-sm-5">
				</div>

			</div>


		</div>



		</form>

	</div>




	<script>



		$('#customer_type').on('change',function(e) {

			console.log(e);

			var po = e.target.value;
			//console.log(po);

			document.getElementById('customer_name').value = "";
			if (po == 'TRA') {


				var profile = document.getElementById("profile");
				profile.setAttribute("href", "{!! url('/guest_profile/travel_agent_list') !!}");
			}

			if (po == 'FIT') {


				var profile = document.getElementById("profile");
				profile.setAttribute("href", "{!! url('/guest_profile/individual_list') !!}");
			}

			if (po == 'CMP') {


				var profile = document.getElementById("profile");
				profile.setAttribute("href", "{!! url('/guest_profile/company_list') !!}");
			}




		});




	</script>



		<script>
		$(function() {
			$( "#datepicker" ).datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true
			});



			$( "#datepicker1" ).datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true
			});
		});

	</script>
	<script>
		$(function () {
			$('#timepicker').datetimepicker({
				format: 'LT'
			});
		});

	</script>
	<script>
		$(".§dropdown-menu li a").click(function(){
			var selText = $(this).text();
			$(this).parents('.btn-group1').find('.dropdown-toggle1').html(selText+' <span class="caret"></span>');
		});

	</script>

  	{{--{{ Session::forget('customer_type') }}--}}

  </body>
</html>