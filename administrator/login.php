<?php require_once('env/functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ADMIN PANEL</title>
	<link rel="icon" href="../img/core-img/favicon.ico">
	<!-- Bootstrap core CSS-->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
	<div class="container">
		<div class="card card-login mx-auto mt-5">
				<div class="card-header text-center">
					<span class="text-center"><strong>Welcome to the Admin Panel</strong></span><br>
					<?php if(isset($_GET['v']) && ($_GET['v'] == 0) ){ ?>
					<span class="text-danger"><strong>Invalid Credentials</strong></span>
					<?php } ?>
				</div>
			<div class="card-body">
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input class="form-control" id="exampleInputEmail1" type="email" name="adm_email" aria-describedby="emailHelp" placeholder="Enter email" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password" required>
					</div>
					<button class="btn btn-primary btn-block" name="login">Login</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
