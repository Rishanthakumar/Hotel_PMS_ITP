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

	<!-- These links the date picker-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
	<div class="row" >

		<form class="form-horizontal" method="post" action="{{ url('/guest_profile/individual_list/create') }}">



			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">

				<div class="col-md-12">
					<div>
						<h3 class="text-muted text-center">
							Customer Profile Management System
						</h3>

						<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">

						<hr>
						<h4 class="text-muted text-center">
							Create New Individual Profile
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

			<div class="col-md-6" style="margin-top: 5%">


				<div class="row">
					<div class="form-group col-md-12" >



						<label for="title_ti" class="col-sm-6" style="font-size: larger">
							Title
						</label>

						<div class="col-sm-5">
							<select class="form-control" style="width: 124%" name="title_ti"value="{{ old('title_ti')}}">
								<option value="Ms">Mr.</option>
								<option value="Mrs">Mrs.</option>
								<option value="Ms">Master.</option>
								<option value="Miss">Miss.</option>
								<option value="Rev">Rev.</option>


							</select>
							@if ($errors->has('title_ti')) <p class="alert-danger">{{ $errors->first('title_ti') }}</p>@else @endif
						</div>

					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12" >



						<label for="first_name" class="col-sm-6" style="font-size: larger" >
							First Name
						</label>

						<div class="col-sm-6">
							<input type="text" name="first_name" class="form-control" id="first_name"value="{{ old('first_name')}}">
							@if ($errors->has('first_name')) <p class="alert-danger">{{ $errors->first('first_name') }}</p>@else @endif
						</div>


					</div>
				</div>




			<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >



						<label for="last_name" class="col-sm-6" style="font-size: larger">
							Last Name
						</label>

						<div class="col-sm-6">
							<input type="text" name="last_name" class="form-control" id="last_name"value="{{ old('last_name')}}">
							@if ($errors->has('last_name')) <p class="alert-danger">{{ $errors->first('last_name') }}</p>@else @endif
						</div>


					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >



						<label for="telephone_number" class="col-sm-6" style="font-size: larger">
							Tel No.
						</label>

						<div class="col-sm-6">
							<input type="text" name="telephone_number" class="form-control" id="tel_no"value="{{ old('telephone_number')}}">
							@if ($errors->has('telephone_number')) <p class="alert-danger">{{ $errors->first('telephone_number') }}</p>@else @endif
						</div>


					</div>
				</div>




				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >




						<label for="bday" class="col-sm-6" style="font-size: larger">
							Date of Birth
						</label>

						<div class="col-sm-6">
							<input type="date" id="datepicker" name="bday" class="form-control" placeholder="Select the date" id="btdate"value="{{ old('bday')}}">
							@if ($errors->has('bday')) <p class="alert-danger">{{ $errors->first('bday') }}</p>@else @endif
						</div>


					</div>
				</div>



				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >




						<label for="nic_passport" class="col-sm-6" style="font-size: larger">
							NIC
						</label>

						<div class="col-sm-6">
							<input type="text" name="nic_passport" class="form-control" id="nic"value="{{ old('nic_passport')}}">
							@if ($errors->has('nic_passport')) <p class="alert-danger">{{ $errors->first('nic_passport') }}</p>@else @endif
						</div>


					</div>
				</div>

				<div class="row" style="margin-top: 1%">
					<div class="form-group col-md-12" >

						<label for="passport_id" class="col-sm-6" style="font-size: larger">
							Passport
						</label>

						<div class="col-sm-6">
							<input type="text" name="passport_id" class="form-control" id="nic"value="{{ old('passport_id')}}">
							@if ($errors->has('passport_id')) <p class="alert-danger">{{ $errors->first('passport_id') }}</p>@else @endif
						</div>


					</div>
				</div>

			</div>



			<div class="col-md-6" style="margin-top: 5%">


				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="address" class="col-sm-5" style="font-size: larger">
							Lane Number
						</label>

						<div class="col-sm-6">
							<input type="text" name="address" class="form-control" id="nic"value="{{ old('address')}}">
							@if ($errors->has('address')) <p class="alert-danger">{{ $errors->first('address') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="lane1" class="col-sm-5" style="font-size: larger">
							Line 1
						</label>

						<div class="col-sm-6">

							<input type="text" name="lane1" class="form-control" id="nic"value="{{ old('lane1')}}">
							@if ($errors->has('lane1')) <p class="alert-danger">{{ $errors->first('lane1') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="lane2" class="col-sm-5" style="font-size: larger">
							Line 2
						</label>

						<div class="col-sm-6">

							<input type="text" name="lane2" class="form-control" id="nic" value="{{ old('lane2')}}">
							@if ($errors->has('lane2')) <p class="alert-danger">{{ $errors->first('lane2') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>

				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="city" class="col-sm-5" style="font-size: larger">
							City
						</label>

						<div class="col-sm-6">

							<input type="text" name="city" class="form-control" id="nic"value="{{ old('city')}}">
							@if ($errors->has('city')) <p class="alert-danger">{{ $errors->first('city') }}</p>@else @endif
						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>


				<div class="row" >
					<div class="form-group col-md-12" >

						<div class="col-sm-1">
						</div>


						<label for="country" class="col-sm-5" style="font-size: larger">
							Country
						</label>

						<div class="col-sm-6">
							<select class="form-control" style="width: 102%" name="country"value="{{ old('country')}}">
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antartica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="Brunei Darussalam">Brunei Darussalam</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Congo">Congo, the Democratic Republic of the</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cota D'Ivoire">Cote d'Ivoire</option>
								<option value="Croatia">Croatia (Hrvatska)</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="France Metropolitan">France, Metropolitan</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
								<option value="Holy See">Holy See (Vatican City State)</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran (Islamic Republic of)</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
								<option value="Korea">Korea, Republic of</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Lao">Lao People's Democratic Republic</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon" selected>Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia">Micronesia, Federated States of</option>
								<option value="Moldova">Moldova, Republic of</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Netherlands Antilles">Netherlands Antilles</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russian Federation</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint LUCIA">Saint LUCIA</option>
								<option value="Saint Vincent">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia (Slovak Republic)</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
								<option value="Span">Spain</option>
								<option value="SriLanka" selected="selected">Sri Lanka</option>
								<option value="St. Helena">St. Helena</option>
								<option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syrian Arab Republic</option>
								<option value="Taiwan">Taiwan, Province of China</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania, United Republic of</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks and Caicos">Turks and Caicos Islands</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Viet Nam</option>
								<option value="Virgin Islands (British)">Virgin Islands (British)</option>
								<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
								<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
								<option value="Western Sahara">Western Sahara</option>
								<option value="Yemen">Yemen</option>
								<option value="Yugoslavia">Yugoslavia</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
							</select>
							@if ($errors->has('country')) <p class="alert-danger">{{ $errors->first('country') }}</p>@else @endif


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

						<div class="col-sm-6">
							<input type="text" name="email" class="form-control" id="email"value="{{ old('email')}}">
							@if ($errors->has('email')) <p class="alert-danger">{{ $errors->first('email') }}</p>@else @endif

						</div>

						<div class="col-sm-1">
						</div>
					</div>
				</div>







				<!--col -6 fininsh 2-->

			</div>



				<div class="row" style="margin-top: 1%;margin-left: 10%">
					<div class="form-group col-md-12" >

						<div class="col-sm-4">
						</div>

						<div class="col-sm-2">
							<button type="submit" name="addbtn" value="addmember"  class=" btn btn-primary " style="width: 55%">
								Add
							</button>


						</div>

						<div class="col-sm-2">
							<div class="btn-group"> <a class="btn btn-warning "   href={!! url('/guest_profile/individual_list') !!}  >Cancel</a></div>
						</div>

						<div class="col-sm-4">
						</div>
					</div>


				</div>
		</form>


	</div>
</div>

<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});

	});

</script>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>