<!DOCTYPE html>
<html>
<head>
	<title>SINBAR</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>

<div class="col-md-4"></div>
<div class="col-md-4">
	<h2 class="text-center">LOGIN</h2>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<form action="{{route('do_login')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<input type="submit" name="simpan" value="Masuk" class="btn btn-info" >
			</form>
		</div>
	</div>
</div>


</body>
</html>