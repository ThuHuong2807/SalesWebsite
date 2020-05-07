<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>

	<link href="public/backend/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/backend/css/datepicker3.css" rel="stylesheet">
	<link href="public/backend/css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="public/backend/js/html5shiv.js"></script>
<script src="public/backend/js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					@if (session('login'))
					<div class="alert alert-danger" role="alert">
						<strong>{{session('login')}}</strong>
					</div>
					@endif
					<form method="post">
						@csrf
						<fieldset>
							@if ($errors->has('email'))
							<div class="alert alert-danger" role="alert">
								<strong>{{$errors->first('email')}}</strong>
							</div>
							@endif
							<div class="form-group">
								<input class="form-control" required placeholder="E-mail" name="email" type="email" autofocus="" value="{{ old('email')}}">
							</div>
							@if ($errors->has('password'))
							<div class="alert alert-danger" role="alert">
								<strong>{{$errors->first('password')}}</strong>
							</div>
							@endif
							<div class="form-group">
								<input class="form-control" required placeholder="Password" name="password" type="password">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary" type="submit">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<!-- /.col-->
	</div>
	<!-- /.row -->

</body>

</html>