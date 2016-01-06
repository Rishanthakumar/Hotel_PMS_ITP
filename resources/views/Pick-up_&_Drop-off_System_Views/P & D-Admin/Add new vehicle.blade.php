<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resorts & Spas</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

	  <meta name="description" content="Source code generated using layoutit.com">
	  <meta name="author" content="LayoutIt!">

	  <!--Links for dropdowns-->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	  <!-- These links the date picker-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">


	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <!--<body style="background-image: url('http://localhost:8888/2.jpg');background-size: 100%";>

  <div class="container-fluid" style="margin-top: 2%">
      <button type="submit" class="btn btn-default" style="margin-top:1%;margin-left: 95%">
          Logout
      </button>-->
  <body>


  <div class="container">

  <div class="row">
	  <div class="col-md-12">

		  <h3 class="text-muted text-center">
			  Pick-up & Drop-off System
		  </h3>
		  <img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left:1%;width: 4%;margin-top: -4%">
		  <hr>

		  <ul class="nav nav-tabs">

			  <li class="active">

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage vehicle fleet<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li class="active">
						  <a href={!! url('addvehicle') !!}>Add new vehicle</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('editvehicle') !!}>Edit vehicle details</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('removevehicle') !!}>Remove vehicles</a>
					  </li>

				  </ul>
			  </li>





			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage driver details<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('adddriver') !!}>Add new driver</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('editdriver') !!}>Edit driver details </a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('removedriver') !!}>Remove drivers</a>
					  </li>

				  </ul>
			  </li>

			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage travelling packages<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('addpackage') !!}>Add new travelling package</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('updatepackage') !!}>Update travelling packages</a>
					  </li>

				  </ul>
			  </li>


			  <li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Manage legal information<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('addvehiclelegal') !!}>Add new vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('adddriverlegal') !!}>Add new driver legal info</a>
					  </li>

					  <li class="divider">
					  </li>

					  <li>
						  <a href={!! url('viewvehiclelegal') !!}>View vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('viewdriverlegal') !!}>View driver legal info</a>
					  </li>
					  <li class="divider">
					  </li>

					  <li>
						  <a href={!! url('updatevehiclelegal') !!}>Update vehicle legal info</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('updatedriverlegal') !!}>Update driver legal info</a>
					  </li>
				  </ul>
			  </li>




			  {{--<li>

				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Generate Reports<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href={!! url('generatevehiclereservationreports') !!}>Generate reports on vehicle reservation</a>
					  </li>
					  <li class="divider">
					  <li>
						  <a href={!! url('generatevehiclereports') !!}>Generate reports on vehicle fleet</a>
					  </li>
					  <li class="divider">
					  </li>
					  <li>
						  <a href={!! url('generatedriverreports') !!}>Generate reports on driver details</a>
					  </li>

				  </ul>
			  </li>--}}

			  {{--<li class="dropdown pull-right">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Transport Supervisor<strong class="caret"></strong></a>
				  <ul class="dropdown-menu">
					  <li>
						  <a href="#">Edit Profile</a>
					  </li>
					  <li>
						  <a href={!! url('login') !!}>Logout</a>
					  </li>
				  </ul>
			  </li>--}}
		  </ul>
	  </div>
  </div>
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
		  <div class="col-md-11">
		  <h4 class="text-muted" style="margin-top: 2%;margin-left: 1%">
			  Add New Vehicle
		  </h4>
		  </div>

	  </div>

	  <br>
	  @if (Session::has ('message'))
		  <div class="alert alert-success">

			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Success!</strong> {{Session::get('message','')}}

		  </div>

	  @elseif (Session::has ('exceptionerr'))
		  <div class="alert alert-danger">

			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Failed : </strong> {{Session::get('exceptionerr','')}}

		  </div>
	  @endif



  <form method="post" class="form-horizontal" role="form" action={!! url('storevehicle') !!} >
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <div class="row" style="margin-top: 3%;">
		  <div class="col-md-6">
			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Vehicle No.
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" value="{{ old('vehicle_no')}}">
					  @if ($errors->has('vehicle_no')) <p class="alert-danger">{{ $errors->first('vehicle_no') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Vehicle Type
				  </label>

				  <div class="col-sm-6">

					  <select class="form-control" id="vehicle_type" name="vehicle_type">
						  <option value="Select a vehicle type">Select a vehicle type </option>
						  <option>Car </option>
						  <option>Van </option>
						  <option>Jeep </option>
						  <option>Lorry </option>
						  <option>Bus </option>


					 </select>

					  @if ($errors->has('vehicle_type')) <p class="alert-danger">{{ $errors->first('vehicle_type') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Brand
				  </label>

				  <div class="col-sm-6">

					  <select class="form-control" id="brand" name="brand">
						  <option value="Select a vehicle brand">Select a vehicle brand </option>
						  <option>Acura</option>
						  <option>Alfa Romeo</option>
						  <option>Aston Martin</option>
						  <option>Audi</option>
						  <option>Bentley</option>
						  <option>BMW</option>
						  <option>Bugatti</option>
						  <option>Buick</option>
						  <option>Cadillac</option>
						  <option>Chevrolet</option>
						  <option>Chrysler</option>
						  <option>Citroen</option>
						  <option>Dodge</option>
						  <option>Ferrari</option>
						  <option>Fiat</option>
						  <option>Ford</option>
						  <option>Geely</option>
						  <option>General Motors</option>
						  <option>GMC</option>
						  <option>Honda</option>
						  <option>Hyundai</option>
						  <option>Infiniti</option>
						  <option>Jaguar</option>
						  <option>Jeep</option>
						  <option>Kia</option>
						  <option>Koenigsegg</option>
						  <option>Lamborghini</option>
						  <option>Land Rover</option>
						  <option>Lexus</option>
						  <option>Maruti</option>
						  <option>Maserati</option>
						  <option>Mazda</option>
						  <option>McLaren</option>
						  <option>Mercedes</option>
						  <option>Mini</option>
						  <option>Mitsubishi</option>
						  <option>Nissan</option>
						  <option>Pagani</option>
						  <option>Peugeot</option>
						  <option>Porsche</option>
						  <option>Ram</option>
						  <option>Renault</option>
						  <option>Rolls Royce</option>
						  <option>Saab</option>
						  <option>Subaru</option>
						  <option>Suzuki</option>
						  <option>TATA</option>
						  <option>Tesla Motors</option>
						  <option>Toyota</option>
						  <option>Volkswagen</option>
						  <option>Volvo</option>
						  <option>Zotye</option>


					  </select>


					  @if ($errors->has('brand')) <p class="alert-danger">{{ $errors->first('brand') }}</p>@else <br>@endif

				  </div>
			  </div>
			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Model
				  </label>

				  <div class="col-sm-6">

					  <input type="text" class="form-control" id="model" name="model" value="{{ old('model')}}">
					  @if ($errors->has('model')) <p class="alert-danger">{{ $errors->first('model') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Colour
				  </label>

				  <div class="col-sm-6">

					  <select class="form-control" id="colour" name="colour" value="{{ old('colour')}}">

						  <option value="Select a colour">Select a vehicle colour </option>
						  <option>Alizarin</option>
						  <option>Amaranth</option>
						  <option>Amber</option>
						  <option>Amethyst</option>
						  <option>Apricot</option>
						  <option>Aqua</option>
						  <option>Aquamarine</option>
						  <option>Asparagus</option>
						  <option>Auburn</option>
						  <option>Azure</option>
						  <option>Beige</option>
						  <option>Bistre</option>
						  <option>Black</option>
						  <option>Blue</option>
						  <option>Blue Green</option>
						  <option>Blue Violet</option>
						  <option>Bondi Blue</option>
						  <option>Brass</option>
						  <option>Bronze</option>
						  <option>Brown</option>
						  <option>Buff</option>
						  <option>Burgundy</option>
						  <option>Burnt Orange</option>
						  <option>Burnt Sienna</option>
						  <option>Burnt Umber</option>
						  <option>Camouflage Green</option>
						  <option>Caput Mortuum</option>
						  <option>Cardinal</option>
						  <option>Carmine</option>
						  <option>Carrot orange</option>
						  <option>Celadon</option>
						  <option>Cerise</option>
						  <option>Cerulean</option>
						  <option>Champagne</option>
						  <option>Charcoal</option>
						  <option>Chartreuse</option>
						  <option>Cherry Blossom Pink</option>
						  <option>Chestnut</option>
						  <option>Chocolate</option>
						  <option>Cinnabar</option>
						  <option>Cinnamon</option>
						  <option>Cobalt</option>
						  <option>Copper</option>
						  <option>Coral</option>
						  <option>Corn</option>
						  <option>Cornflower</option>
						  <option>Cream</option>
						  <option>Crimson</option>
						  <option>Cyan</option>
						  <option>Dandelion</option>
						  <option>Denim</option>
						  <option>Ecru</option>
						  <option>Emerald</option>
						  <option>Eggplant</option>
						  <option>Falu red</option>
						  <option>Fern green</option>
						  <option>Firebrick</option>
						  <option>Flax</option>
						  <option>Forest green</option>
						  <option>French Rose</option>
						  <option>Fuchsia</option>
						  <option>Gamboge</option>
						  <option>Gold</option>
						  <option>Goldenrod</option>
						  <option>Green</option>
						  <option>Grey</option>
						  <option>Han Purple</option>
						  <option>Harlequin</option>
						  <option>Heliotrope</option>
						  <option>Hollywood Cerise</option>
						  <option>Indigo</option>
						  <option>Ivory</option>
						  <option>Jade</option>
						  <option>Kelly green</option>
						  <option>Khaki</option>
						  <option>Lavender</option>
						  <option>Lawn green</option>
						  <option>Lemon</option>
						  <option>Lemon chiffon</option>
						  <option>Lilac</option>
						  <option>Lime</option>
						  <option>Lime green</option>
						  <option>Linen</option>
						  <option>Magenta</option>
						  <option>Magnolia</option>
						  <option>Malachite</option>
						  <option>Maroon</option>
						  <option>Mauve</option>
						  <option>Midnight Blue</option>
						  <option>Mint green</option>
						  <option>Misty rose</option>
						  <option>Moss green</option>
						  <option>Mustard</option>
						  <option>Myrtle</option>
						  <option>Navajo white</option>
						  <option>Navy Blue</option>
						  <option>Ochre</option>
						  <option>Office green</option>
						  <option>Olive</option>
						  <option>Olivine</option>
						  <option>Orange</option>
						  <option>Orchid</option>
						  <option>Papaya whip</option>
						  <option>Peach</option>
						  <option>Pear</option>
						  <option>Periwinkle</option>
						  <option>Persimmon</option>
						  <option>Pine Green</option>
						  <option>Pink</option>
						  <option>Platinum</option>
						  <option>Plum</option>
						  <option>Powder blue</option>
						  <option>Puce</option>
						  <option>Prussian blue</option>
						  <option>Psychedelic purple</option>
						  <option>Pumpkin</option>
						  <option>Purple</option>
						  <option>Quartz Grey</option>
						  <option>Raw umber</option>
						  <option>Razzmatazz</option>
						  <option>Red</option>
						  <option>Robin egg blue</option>
						  <option>Rose</option>
						  <option>Royal blue</option>
						  <option>Royal purple</option>
						  <option>Ruby</option>
						  <option>Russet</option>
						  <option>Rust</option>
						  <option>Safety orange</option>
						  <option>Saffron</option>
						  <option>Salmon</option>
						  <option>Sandy brown</option>
						  <option>Sangria</option>
						  <option>Sapphire</option>
						  <option>Scarlet</option>
						  <option>School bus yellow</option>
						  <option>Sea Green</option>
						  <option>Seashell</option>
						  <option>Sepia</option>
						  <option>Shamrock green</option>
						  <option>Shocking Pink</option>
						  <option>Silver</option>
						  <option>Sky Blue</option>
						  <option>Slate grey</option>
						  <option>Smalt</option>
						  <option>Spring bud</option>
						  <option>Spring green</option>
						  <option>Steel blue</option>
						  <option>Tan</option>
						  <option>Tangerine</option>
						  <option>Taupe</option>
						  <option>Teal</option>
						  <option>Tenné (Tawny)</option>
						  <option>Terra cotta</option>
						  <option>Thistle</option>
						  <option>Titanium White</option>
						  <option>Tomato</option>
						  <option>Turquoise</option>
						  <option>Tyrian purple</option>
						  <option>Ultramarine</option>
						  <option>Van Dyke Brown</option>
						  <option>Vermilion</option>
						  <option>Violet</option>
						  <option>Viridian</option>
						  <option>Wheat</option>
						  <option>White</option>
						  <option>Wisteria</option>
						  <option>Xanthic</option>
						  <option>Yellow</option>
						  <option>Zucchini</option>

						  </select>


					  @if ($errors->has('colour')) <p class="alert-danger">{{ $errors->first('colour') }}</p>@else <br>@endif

				  </div>
			  </div>




		  </div>

		   <div class="col-md-6" style="margin-right:0">

		  <div class="form-group"style="margin-left: 10%">

			  <label for="Name" class="col-sm-4" style="font-size: larger">
				  Cylinder Capacity
			  </label>

			  <div class="col-sm-7">

				  <input type="text" class="form-control" id="cylinder_capacity" name="cylinder_capacity" value="{{ old('cylinder_capacity')}}">
				  @if ($errors->has('cylinder_capacity')) <p class="alert-danger">{{ $errors->first('cylinder_capacity') }}</p>@else <br>@endif

			  </div>
		  </div>


			  <div class="form-group" style="margin-left: 10%">

				  <label for="departure" class="col-sm-4" style="font-size: large">
					  Registered Date
				  </label>

				  <div class="col-sm-7">
					  <input type="date" value="{{  old('reg_date')}}" class="form-control" id="datepicker" name="reg_date" placeholder="Select the date" />
					  @if ($errors->has('reg_date')) <p class="alert-danger">{{ $errors->first('reg_date') }}</p>@else<br> @endif

				  </div>

			  </div>



			  <div class="form-group" style="margin-left: 10%">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Manufactured Year
				  </label>

				  <div class="col-sm-7">

					  <input type="text" class="form-control" id="datepicker1" name="manu_year" value="{{ old('manu_year')}}">
					  @if ($errors->has('manu_year')) <p class="alert-danger">{{ $errors->first('manu_year') }}</p>@else <br>@endif

				  </div>
			  </div>


			  <div class="form-group" style="margin-left: 10%">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Rate per KM
				  </label>

				  <div class="col-sm-7">

					  <input type="text" class="form-control" id="rate_per_km" name="rate_per_km" value="{{ old('rate_per_km')}}">
					  @if ($errors->has('rate_per_km')) <p class="alert-danger">{{ $errors->first('rate_per_km') }}</p>@else <br>@endif

				  </div>
			  </div>

			  <div class="form-group" style="margin-left: 10%">

				  <label for="Name" class="col-sm-4" style="font-size: larger">
					  Status
				  </label>

				  <div class="col-sm-7">

					  <select class="form-control" id="status" name="status" value="{{ old('status')}}">
						  <option value="Select a status">Select a vehicle status </option>
						  <option>Available</option>
						  <option>Busy</option>

						  </select>

					  @if ($errors->has('status')) <p class="alert-danger">{{ $errors->first('status') }}</p>@else <br>@endif

				  </div>
			  </div>
		  </div>

		  <div class="row" style="margin-top: 25%;margin-left: 15%">
			  <div class="col-md-12">


				  <div class="col-sm-3">
				  </div>



				  <button type="submit" class="btn btn-primary  col-sm-1 " style="width: 8.5%">
					  Add
				  </button>

				  <div class="col-sm-1">
				  </div>

				  <div class="btn-group col-sm-1">
					  <a class="btn btn-warning  btn-block" href={!! url('supervisorwelcome') !!} style="width:150%">Cancel
					  </a>
				  </div>




			  </div>

		  </div>

	  </div>


  </form>

			</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>


  <!--Links for Time picker-->
  <script src="https://raw.githubusercontent.com/moment/moment/develop/moment.js"></script>
  <script src="https://raw.githubusercontent.com/moment/moment/master/locale/id.js"></script>
  <script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

  <!--Functions of date and timepicker-->

  <script>
	  $(function() {
		  $( "#datepicker" ).datepicker({
			  maxDate:0,
			  dateFormat: 'yy-mm-dd',
			  changeMonth: true,
			  changeYear: true
		  });



		  $("#datepicker1").datepicker( {
			  maxDate:0,
			  dateFormat: 'yy',
			  viewMode: 'yyyy',
			  changeYear: true,

		  });
	  });

  </script>


  </body>
</html>