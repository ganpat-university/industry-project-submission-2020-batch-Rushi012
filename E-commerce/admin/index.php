
<!DOCTYPE html>
<html>
<head>
	<?php require "php/include.php"; ?>
	<title>Admin login</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href= "php/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="php/dist/css/admin_style.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="ogs-login-container">
				<br>
				<br>
				<br>
				<br>
				<form method="POST" action="php/auth.php">
			 		<div class="form-group">
						<label for="userName">Username</label>
						<input type="text" name="userName" id="userName" class="form-control" placeholder="Username" autofocus>
					</div>
					<div class="form-group">
						<label for="userPassword">Password</label>
						<input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Password">
					</div>
					<div class="form-group text-right">
						<a href="<?php echo SITE_URL . "admin/forgot_password.php"; ?>">Forgot Password</a>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
	</div>
</div>

	<script src="php/dist/js/jquery-3.2.1.min.js"></script>
	<script src="php/dist/js/bootstrap.min.js"></script>
</body>
</html>