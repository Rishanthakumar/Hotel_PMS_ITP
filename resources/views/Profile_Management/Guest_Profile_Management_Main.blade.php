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

  @if (session('succ_status')||session('error_status'))
	  <div class="modal fade text-center" id="modelpopup" role="dialog">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">


					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-header"></h4>
				  </div>

				  <div class=" row modal-body">
					  @if(session('succ_status'))
						  <div class="alert alert-success">
							  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>{{ session('succ_status') }}
						  </div>
					  @elseif(session('error_status'))
						  <div class="alert alert-danger">
							  {{ session('error_status') }}
						  </div>
					  @endif

				  </div>

				  {{ Session::forget('succ_status')}}
			  </div>



		  </div>
	  </div>

	  <script>
		  $(document).ready(function(){
			  $('#modelpopup').modal('show');
		  });
	  </script>


  @endif

    <div class="container">
	<div class="row">
		<div class="col-md-12">
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
						Profile Options
					</h4>
				</div>

					<div class="btn-group" align="right">
						<a class="btn btn-default  btn-block" href="{!! url('/FO_mainpage') !!}" style="width:100%">Main Panel
						</a>
					</div>
			</div>
				</div>
			<div class="row" style="margin-top: 4%;margin-left: 8%">
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/1.png') }}" width="60%" height="50%"  />

							<div class="btn-group btn-block"> <a class="btn btn-default dropdown-toggle btn-select"  href={!! url('guest_profile/preferences_list') !!} style="width:100%">Preferences</a>

							</div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%"><img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/3.png') }}" width="60%" height="50%"  />
						<div class="btn-group btn-block"> <a class="btn btn-default "  href={!! url('/guest_profile/individual_list') !!} style="width:100%">Guest Profile Management</a></div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/5.png') }}" width="60%" height="50%"  />

							<div class="btn-group btn-block "> <a class="btn btn-default "  href={{ url('/guest_profile/changeslog') }} style="width:100%">Log of Changes </a></div>

					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 2%;margin-left: 8%">
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/10.png') }}" width="60%" height="50%"  />

							<div class="btn-group btn-block"> <a class="btn btn-default "  href="{{ url('/guest_profile/pastreservations')}}" style="width: 100%">Reservation Details</a></div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/7.png') }}" width="60%" height="50%"  />

							<div class="btn-group btn-block"> <a class="btn btn-default "  href={!! url('/guest_profile/mergeprofile') !!} style="width:100%">Merge profile</a></div>

					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail" style="width: 70%">
					<img alt="Bootstrap Thumbnail First" src="{{ asset('/Guest_Profile_Images/6.png') }}" width="60%" height="50%"  />

							<div class="btn-group btn-block"> <a class="btn btn-default"  href="{{url('guest_profile/relationship')}}" style="width: 100%">Relationship</a></div>

					</div>
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