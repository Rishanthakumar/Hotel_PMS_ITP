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

	  <!--Links for dropdowns-->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


	  <!-- These links the date picker-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">

	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
	<div class="row" >
		<div class="col-md-3">
		</div>
		<div class="col-md-12">
			<h3 class="text-center text-muted">
				Front Office Management System
			</h3>
			<img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
			<hr>
			<h4 class="text-center text-muted">
				Chat
			</h4>



		</div>
		<div class="col-md-3" align="left">
			<div class="btn-group">
				<a class="btn btn-default  btn-block" href={!! url('/FO_mainpage') !!} style="width:100%">Home
				</a>
			</div>
		</div>
	</div>
	<div class="row">

		<h3 class="text-center" > </h3>
		<br /><br />
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					RECENT CHAT HISTORY
				</div>
				<div class="panel-body">
					<ul class="media-list">

						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle " src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										Donec sit amet ligula enim. Duis vel condimentum massa.

										Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
										Duis vel condimentum massa.
										Donec sit amet ligula enim. Duis vel condimentum massa.
										<br />
										<small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
										<hr />
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle " src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										Donec sit amet ligula enim. Duis vel condimentum massa.

										Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
										Duis vel condimentum massa.
										Donec sit amet ligula enim. Duis vel condimentum massa.
										<br />
										<small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
										<hr />
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle " src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										Donec sit amet ligula enim. Duis vel condimentum massa.

										Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
										Duis vel condimentum massa.
										Donec sit amet ligula enim. Duis vel condimentum massa.
										<br />
										<small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
										<hr />
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle " src="{{ asset('FO_chat_images/user.gif')}}" />
									</a>
									<div class="media-body" >
										Donec sit amet ligula enim. Duis vel condimentum massa.

										Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
										Duis vel condimentum massa.
										Donec sit amet ligula enim. Duis vel condimentum massa.
										<br />
										<small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
										<hr />
									</div>
								</div>

							</div>
						</li>
					</ul>
				</div>
				<div class="panel-footer">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Enter Message" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button">SEND</button>
                                    </span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					ONLINE USERS
				</div>
				<div class="panel-body">
					<ul class="media-list">

						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.png')}}"/>
									</a>
									<div class="media-body" >
										<h5>Alex Deo | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src=""{{ asset('FO_chat_images/user.gif')}}" />
									</a>
									<div class="media-body" >
										<h5>Jhon Rexa | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										<h5>Alex Deo | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src=""{{ asset('FO_chat_images/user.gif')}}" />
									</a>
									<div class="media-body" >
										<h5>Jhon Rexa | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										<h5>Alex Deo | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.gif')}}" />
									</a>
									<div class="media-body" >
										<h5>Jhon Rexa | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.png')}}" />
									</a>
									<div class="media-body" >
										<h5>Alex Deo | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
						<li class="media">

							<div class="media-body">

								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-circle" style="max-height:40px;" src="{{ asset('FO_chat_images/user.gif')}}" />
									</a>
									<div class="media-body" >
										<h5>Jhon Rexa | User </h5>

										<small class="text-muted">Active From 3 hours</small>
									</div>
								</div>

							</div>
						</li>
					</ul>
				</div>
			</div>



		</div>

	</div>



  </body>
</html>